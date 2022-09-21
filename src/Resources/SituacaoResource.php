<?php

namespace LojaVirtual\Bling\Resources;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

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