<?php

namespace LojaVirtual\Bling\Resources;


use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Format\JSON;
use LojaVirtual\Bling\Format\XML;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Request\ResponseHandler;

abstract class AbstractResource
{
    protected Request $request;

    private array $options = [];

    public function __construct(?array $options = [])
    {
        $this->options = $options;
        $this->request = Request::getInstance();
    }

    /**
     * Retorna os options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Transforma o payload em XML
     *
     * @param array $payload
     * @param string $rootNode
     * @return string
     */
    protected function payloadToXML(array $payload, string $rootNode): string
    {
        return rawurlencode(XML::to($payload, $rootNode));
    }

    /**
     * Transforma o payload em JSON
     *
     * @param array $payload
     * @return string
     */
    protected function payloadToJSON(array $payload): string
    {
        return JSON::to($payload);
    }

    /**
     * Faz o parse da resposta
     *
     * @param ResponseHandler $responseHandler
     * @return object
     * @throws BlingException
     * @throws \LojaVirtual\Bling\Exceptions\InvalidJsonException
     * @throws \LojaVirtual\Bling\Exceptions\InvalidXmlException
     */
    protected function parseResponse(ResponseHandler $responseHandler): object
    {
        $body = $responseHandler->getBody();
        if ($responseHandler->isFail()) {
            throw new BlingException("#{$body->erro->cod} | {$body->erro->msg}");
        }

        return $body;
    }
}