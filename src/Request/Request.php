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

    private static ?Request $instance = null;
    private ClientInterface $httpClient;
    private static array $payloadTypes = [
        'POST' => 'form_params',
        'PUT' => 'form_params',
        'GET' => 'query',
        'DELETE' => 'form_params'
    ];

    private static array $payloadFormats = [
        'POST' => 'xml',
        'PUT' => 'xml',
        'GET' => 'query',
        'DELETE' => 'query'
    ];

    protected function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => Bling::getBaseURI(),
            'timeout' => Bling::getTimeout(),
            'headers' => [
                'User-Agent' => 'Integração LojaVirtual.com.br | Contato: Pablo Sanches <sanches.webmaster@gmail.com>'
            ]
        ]);
    }

    /**
     * Retorna uma instância de Request
     *
     * @return Request
     */
    public static function getInstance(): Request
    {
        if (is_null(self::$instance)) {
            self::$instance = new Request();
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
        if (!array_key_exists('apikey', $payload)) {
            $payload['apikey'] = Bling::$token;
        }

        return array(
            self::$payloadTypes[$method] => $payload
        );
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
        array $options
    ): ResponseHandler {
        try {
            $response = $this
                ->httpClient
                ->request(
                    $method,
                    sprintf("%s/json", $endpoint),
                    Request::preparePayload($method, $options)
                );

            return ResponseHandler::success($response);
        } catch (ClientException $e) {
            return ResponseHandler::failure($e);
        }
    }
}