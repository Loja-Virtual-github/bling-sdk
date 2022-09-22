<?php

namespace PabloSanches\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Request\HttpMethods;
use PabloSanches\Bling\Routes\AvailableRoutes;

class SituacaoResource extends AbstractResource implements ResourceInterface
{
    /**
     * [INDISPONÍVEL]
     *
     * @return object
     * @throws InvalidEndpointException
     */
    public function fetch(): object
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * Retorna todas as situações de um determinado módulo
     *
     * @return array
     * @throws InvalidEndpointException
     * @throws GuzzleException
     */
    public function fetchAll(): array
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH_ALL)
        );
    }

    /**
     * [INDISPONÍVEL]
     *
     * @param array $payload
     * @return object
     * @throws InvalidEndpointException
     */
    public function insert(array $payload): object
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @param array $payload
     * @return object
     * @throws InvalidEndpointException
     */
    public function update(array $payload): object
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return mixed
     * @throws InvalidEndpointException
     */
    public function delete(): mixed
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}