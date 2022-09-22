<?php

namespace PabloSanches\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Request\HttpMethods;
use PabloSanches\Bling\Routes\AvailableRoutes;

class CampoCustomizadoResource extends AbstractResource implements ResourceInterface
{
    /**
     * Retorna os campos customizados de um módulo
     *
     * @return mixed
     * @throws InvalidEndpointException
     * @throws GuzzleException
     */
    public function fetch(): object
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH)
        );
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return array
     * @throws InvalidEndpointException
     */
    public function fetchAll(): array
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
    public function insert(array $payload): object
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @param array $payload
     * @return object
     * @throws InvalidEndpointException [
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