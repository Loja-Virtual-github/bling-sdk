<?php

namespace PabloSanches\Bling\Request;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use PabloSanches\Bling\Bling;

class Request
{
    private static ?Request $instance = null;
    private ClientInterface $http_client;
    private static array $payload_format = [
        'POST' => 'form_params',
        'PUT' => 'form_params',
        'GET' => 'query'
    ];

    public function __construct(ClientInterface $httpClient)
    {
        $this->http_client = $httpClient;
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
    private function preparePayload(string $method, array $payload): array
    {
        $payload['apikey'] = Bling::$token;

        if (!empty(Bling::$idLoja)) {
            $payload['loja'] = Bling::$idLoja;
        }

        $payloadFormat = self::$payload_format[$method];
        return [
            $payloadFormat => $payload,
            'debug' => false
        ];
    }

    /**
     * Efetua uma request
     *
     * @param HttpMethods $method
     * @param string $endpoint
     * @param array $options
     * @return ResponseHandler
     * @throws GuzzleException
     */
    public function sendRequest(
        HttpMethods $method,
        string $endpoint,
        array $options = [],
        ?int $page = 1
    ): ResponseHandler {
        try {
            $endpoint = $this->buildEndpoint(
                $endpoint,
                Bling::getFormat(),
                $page
            );

            $response = $this
                ->http_client
                ->request(
                    $method->value,
                    $endpoint,
                    $this->preparePayload($method->value, $options)
                );
            sleep(1);
            return ResponseHandler::success($response);
        } catch (ClientException $e) {
            return ResponseHandler::failure($e);
        }
    }

    /**
     * Retorna o endpoint
     *
     * @param string $baseEndpoint
     * @param string $format
     * @param int $page
     * @return string
     */
    private function buildEndpoint(
        string $baseEndpoint,
        string $format,
        int $page
    ): string {
        if ($page === 1) {
            return sprintf("%s/%s/", $baseEndpoint, $format);
        }

        return sprintf("%s/page=%s/%s/", $baseEndpoint, $page, $format);
    }
}