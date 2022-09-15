<?php

namespace LojaVirtual\Bling\Request;

use GuzzleHttp\Psr7\Response;
use LojaVirtual\Bling\Format\JSON;
use LojaVirtual\Bling\Format\XML;

class ResponseHandler
{
    private readonly Response $response;

    protected function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * Retorna uma nova instância do response handler
     *
     * @param Response $response
     * @return ResponseHandler
     */
    public static function success(Response $response): ResponseHandler
    {
        return new ResponseHandler($response);
    }

    /**
     * Retorna uma nova instância do response handler
     *
     * @param \Exception $exception
     * @return ResponseHandler
     */
    public static function failure(\Exception $exception): ResponseHandler
    {
        return new ResponseHandler($exception->getResponse());
    }

    /**
     * Retorna o conteúdo da resposta
     *
     * @return object
     * @throws \LojaVirtual\Bling\Exceptions\InvalidJsonException
     * @throws \LojaVirtual\Bling\Exceptions\InvalidXmlException
     */
    public function getBody(): object
    {
        $contentType = $this->response->getHeader('content-type');
        $contentType = current($contentType);
        $contentType = mb_strtolower($contentType);

        $contentBody = $this->response->getBody()->getContents();
        if (str_contains($contentType, 'xml')) {
            $body = XML::from($contentBody);
        } else {
            $body = JSON::from($contentBody);
        }

        if (property_exists($body, 'retorno')) {
            $body = $body->retorno;
        }

        if (property_exists($body, 'erros')) {
            $body = $body->erros;
        }

        return $body;
    }

    public function isFail(): bool
    {
        return $this->response->getStatusCode() >= 300;
    }
}