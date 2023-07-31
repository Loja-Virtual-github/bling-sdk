<?php

namespace LojaVirtual\Bling\Resources;


use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Format\FormatFactory;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Request\Request;
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
     * @param int|null $page
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidResponseFormatException
     */
    public function request(
        HttpMethods $method,
        string $endpoint,
        array $options = [],
        $pagination = false,
        ?int $page = 1,
    ): mixed {

        if ($method === HttpMethods::GET && $pagination) {
            return $this->getPaginatedRequest(
                $method,
                $endpoint,
                $options,
                $page
            );
        }

        $response = $this
            ->request
            ->sendRequest(
                $method,
                $endpoint,
                $options,
                $page
            );

        return $this->resourceResponseHandler->parse($response);
    }

    /**
     * Retorna os registros paginados
     *
     * @param HttpMethods $method
     * @param string $endpoint
     * @param array $options
     * @param int|null $page
     * @return array
     * @throws GuzzleException
     * @throws InvalidResponseFormatException
     */
    private function getPaginatedRequest(
        HttpMethods $method,
        string $endpoint,
        array $options = [],
        ?int $page = 1
    ): array {

        $mergedResponses = [];
        do {
            $response = $this
                ->request
                ->sendRequest(
                    $method,
                    $endpoint,
                    $options,
                    $page
                );

            $codError = $response->getCodError();
            if ($codError !== 14) {
                $mergedResponses[] = $response;
                $page++;
            }
        } while ($codError !== 14);
        return $this->parsePaginatedResponses($mergedResponses);
    }

    /**
     * Executa o handler individual de respostas e retorna um array com todas as páginas
     *
     * @param array $mergedResponses
     * @return array
     */
    private function parsePaginatedResponses(array $mergedResponses): array
    {
        $merged = array();

        foreach ($mergedResponses as $response) {
            $responseParsed = $this->resourceResponseHandler->parse($response);
            if (is_array($responseParsed)) {
                $merged = array_merge($merged, $responseParsed);
            } else {
                $merged[] = $responseParsed;
            }
        }

        return $merged;
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