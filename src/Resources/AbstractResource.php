<?php

namespace LojaVirtual\Bling\Resources;


use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Format\FormatFactory;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Request\ResponseHandler;
use LojaVirtual\Bling\Resources\Response\ResourceResponseFactory;
use LojaVirtual\Bling\Resources\Response\ResourceResponseInterface;
use LojaVirtual\Bling\Routes\AvailableRoutes;
use LojaVirtual\Bling\Routes\RouteFactory;
use LojaVirtual\Bling\Routes\RouteInterface;

abstract class AbstractResource
{
    protected Request $request;
    protected ResourceResponseInterface $resourceResponseHandler;
    protected RouteInterface $route;
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
        $this->route = RouteFactory::factory(get_class($this), $this->getOptions());
    }

    public function request(
        HttpMethods $method,
        string $endpoint,
        array $options = []
    ): mixed {

        $response = $this
            ->request
            ->sendRequest(
                $method,
                $endpoint,
                $options
            );

        return $this->resourceResponseHandler->parse($response);
    }

    /**
     * Retorna o endpoint baseado no nome do método
     *
     * @param AvailableRoutes $endpoint
     * @return ?string
     * @throws InvalidEndpointException
     */
    protected function getEndpoint(AvailableRoutes $endpoint): ?string
    {
        if (!method_exists($this->route, $endpoint->value)) {
            throw new InvalidEndpointException("Funcionalidade $endpoint->value não disponibilizada.");
        }

        switch ($endpoint->value) {
            case 'delete':
            case 'fetch':
            case 'update':
                return $this->route->{$endpoint->value}(...$this->getOptions());
        }

        return $this->route->{$endpoint->value}();
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
     * Seta novas opções
     *
     * @param array $options
     * @return void
     */
    protected function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * Transforma o payload em XML
     *
     * @param array $payload
     * @param string $rootNode
     * @return string
     * @throws InvalidResponseFormatException
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
     * @throws InvalidResponseFormatException
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
     * @param string $responseKey
     * @return object
     * @throws BlingException
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