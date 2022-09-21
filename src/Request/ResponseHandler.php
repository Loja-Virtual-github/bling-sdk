<?php

namespace LojaVirtual\Bling\Request;

use GuzzleHttp\Psr7\Response;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\BlingResourceException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Format\FormatFactory;

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
     * @return mixed
     */
    public function getBody(): mixed
    {
        $contentBody = $this
            ->response
            ->getBody()
            ->getContents();

        $formater = FormatFactory::factory($this->getContentType());
        $body = $formater->from($contentBody);
        return $body;
    }

    /**
     * Retorna o content-type da resposta
     *
     * @return string
     */
    public function getContentType(): string
    {
        $contentType = $this
            ->response
            ->getHeader('content-type');

        $contentType = current($contentType);
        $contentType = mb_strtoupper($contentType);
        $contentTypeParts = explode('/', $contentType);
        return end($contentTypeParts);
    }

    /**
     * Verifica se a request teve sucesso
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return ($this->getStatusCode() >= 200 && $this->getStatusCode() < 300);
    }

    /**
     * Verifica se request falhou
     *
     * @return bool
     */
    public function isFail(): bool
    {
        return ($this->getStatusCode() >= 300);
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