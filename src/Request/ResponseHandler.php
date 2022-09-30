<?php

namespace LojaVirtual\Bling\Request;

use Exception;
use GuzzleHttp\Psr7\Response;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Format\FormatFactory;

class ResponseHandler
{
    private readonly Response $response;
    private readonly string $bodyContent;

    protected function __construct(Response $response)
    {
        $this->response = $response;
        $this->bodyContent = $response->getBody()->getContents();
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
     * @param Exception $exception
     * @return ResponseHandler
     */
    public static function failure(Exception $exception): ResponseHandler
    {
        return new ResponseHandler($exception->getResponse());
    }

    /**
     * Retorna o conteúdo da resposta
     *
     * @return object
     * @throws InvalidResponseFormatException
     */
    public function getBody(): object
    {
        $formatter = FormatFactory::factory($this->getContentType());
        return $formatter->from($this->bodyContent);
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
     * Retorna o código de erro quando existir
     *
     * @return false|int
     * @throws InvalidResponseFormatException
     */
    public function getCodError(): false|int
    {
        $body = $this->getBody();

        if (is_object($body) && property_exists($body, 'retorno')) {
            $body = $body->retorno;
        }

        if (property_exists($body, 'erros')) {
            $body = $body->erros;
            if (is_array($body)) {
                foreach ($body as $item) {
                    if (is_object($item) && property_exists($item, 'erro')) {
                        $body = $item->erro;
                        if (property_exists($body, 'cod')) {

                            if ($body->cod !== 14) {
                                throw new BlingException($body->msg);
                            }

                            return $body->cod;
                        }
                    }
                }
            } else {
                if (is_object($body) && property_exists($body, 'erro')) {
                    $body = $body->erro;
                    if (property_exists($body, 'cod')) {
                        if ($body->cod !== 14) {
                            throw new BlingException($body->msg);
                        }

                        return $body->cod;
                    }

                }
            }
        }

        return false;
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