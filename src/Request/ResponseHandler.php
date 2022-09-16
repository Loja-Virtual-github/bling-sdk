<?php

namespace LojaVirtual\Bling\Request;

use GuzzleHttp\Psr7\Response;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
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
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function getBody(): object
    {
        $contentType = $this->response->getHeader('content-type');
        $contentType = current($contentType);
        $contentType = mb_strtolower($contentType);

        $contentBody = $this->response->getBody()->getContents();
        if (str_contains($contentType, 'xml')) {
            $body = XML::from($contentBody);
        } else if (str_contains($contentType, 'json')) {
            $body = JSON::from($contentBody);
        } else {
            throw new InvalidResponseFormatException($contentBody);
        }

        if (property_exists($body, 'retorno')) {
            $body = $body->retorno;
        }

        if (property_exists($body, 'erros')) {
            $errorMsg = (array) $body->erros;

            if (is_array($errorMsg)) {
                $errorMsg = $errorMsg[0];
            }

            if (property_exists($errorMsg, 'erro')) {
                $errorMsg = (array) $errorMsg->erro;
            }
            throw new BlingException(implode("\r\n", $errorMsg));
        }

        return $body;
    }

    /**
     * Verifica se a request teve sucesso
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->getStatusCode() >= 200 && $this->getStatusCode() < 300;
    }

    /**
     * Verifica se request falhou
     *
     * @return bool
     */
    public function isFail(): bool
    {
        return $this->getStatusCode() >= 300;
    }

    /**
     * Retorna o status code da request
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }
}