<?php

namespace LojaVirtual\Bling\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use Exception;

class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';

    private static $payloadFormat = [
        'POST' => 'form_params',
        'PUT' => 'form_params',
        'GET' => 'query'
    ];

    private static ?Request $instance = null;
    private ClientInterface $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Retorna uma instância de Request
     *
     * @return Request
     */
    public static function getInstance(): Request
    {
        if (is_null(self::$instance)) {
            self::$instance = RequestFactory::factory();
        }

        return self::$instance;
    }

    /**
     * Adiciona apikey no payload
     *
     * @param string $method
     * @param array $payload
     * @return array
     */
    public static function preparePayload(string $method, array $payload): array
    {
        $payload['apikey'] = Bling::$token;

        if (!empty(Bling::$idLoja)) {
            $payload['loja'] = Bling::$idLoja;
        }

        $payloadFormat = self::$payloadFormat[$method];
        return [
            $payloadFormat => $payload,
            'debug' => false
        ];
    }

    /**
     * Efetua uma request
     *
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @return ResponseHandler
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     * @throws GuzzleException
     */
    public function sendRequest(
        string $method,
        string $endpoint,
        array $options = []
    ): ResponseHandler {
        try {
            $response = $this
                ->httpClient
                ->request(
                    $method,
                    sprintf("%s/json/", $endpoint),
                    self::preparePayload($method, $options)
                );
            sleep(1);
            return ResponseHandler::success($response);
        } catch (ClientException $e) {
            return ResponseHandler::failure($e);
        }
    }
}