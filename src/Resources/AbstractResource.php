<?php

namespace LojaVirtual\Bling\Resources;


use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Format\FormatFactory;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Request\ResponseHandler;
use LojaVirtual\Bling\Resources\Response\ResourceResponseFactory;
use LojaVirtual\Bling\Resources\Response\ResourceResponseInterface;

abstract class AbstractResource
{
    protected Request $request;
    protected ResourceResponseInterface $resourceResponseHandler;
    private array $options = [];

    /**
     * @param array|null $options
     * @throws InvalidResourceException
     */
    public function __construct(?array $options = [])
    {
        $this->options = $options;
        $this->request = Request::getInstance();
        $this->resourceResponseHandler = ResourceResponseFactory::factory(get_class($this));
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
        $formater = FormatFactory::factory('xml');
        return rawurlencode($formater->to($payload, $rootNode));
    }

    /**
     * Transforma o payload em JSON
     *
     * @param array $payload
     * @return string
     */
    protected function payloadToJSON(array $payload): string
    {
        $formater = FormatFactory::factory('json');
        return $formater->to($payload);
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
    protected function parseResponse(ResponseHandler $responseHandler, string $responseKey): object
    {
        $body = $responseHandler->getBody($responseKey);
        if ($responseHandler->isFail()) {
            throw new BlingException("#{$body->erro->cod} | {$body->erro->msg}");
        }

        return $body;
    }

    /**
     * Simplifica a lista retornada pela API
     *
     * @param array $result
     * @param string $rootKey
     * @return array
     */
    protected function unwrapFetchAll(array $result, string $rootKey): array
    {
        $unwrapped = [];
        foreach ($result as $obj) {
            if (property_exists($obj, $rootKey)) {
                $unwrapped[] = $obj->{$rootKey};
            }
        }

        return $unwrapped;
    }
}