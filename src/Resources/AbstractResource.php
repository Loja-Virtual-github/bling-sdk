<?php

namespace PabloSanches\Bling\Resources;


use GuzzleHttp\Exception\GuzzleException;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Exceptions\InvalidResourceException;
use PabloSanches\Bling\Exceptions\InvalidResponseFormatException;
use PabloSanches\Bling\Format\FormatFactory;
use PabloSanches\Bling\Request\HttpMethods;
use PabloSanches\Bling\Request\Request;
use PabloSanches\Bling\Resources\Response\ResourceResponseFactory;
use PabloSanches\Bling\Resources\Response\ResourceResponseInterface;
use PabloSanches\Bling\Routes\AvailableRoutes;
use PabloSanches\Bling\Routes\RouteFactory;
use PabloSanches\Bling\Routes\RouteInterface;

abstract class AbstractResource
{
    protected Request $request;
    protected ResourceResponseInterface $resourceResponseHandler;
    protected RouteInterface $route;
    private array $options;

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

    /**
     * Executa uma request
     *
     * @param HttpMethods $method
     * @param string $endpoint
     * @param array $options
     * @return mixed
     * @throws GuzzleException
     */
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

        return match ($endpoint->value) {
            'delete', 'fetch', 'update' => $this->route->{$endpoint->value}(...$this->getOptions()),
            default => $this->route->{$endpoint->value}(),
        };
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
     * @throws InvalidResponseFormatException
     */
    protected function payloadToXML(array $payload, string $rootNode): string
    {
        $formatter = FormatFactory::factory('xml');
        return rawurlencode($formatter->to($payload, $rootNode));
    }
}