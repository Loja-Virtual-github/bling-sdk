<?php

namespace LojaVirtual\Bling\Resources;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

class CampoCustomizadoResource extends AbstractResource implements ResourceInterface
{
    public const PRODUTOS = 'Produtos';
    public const CONTATOS = 'Contatos';

    /**
     * Retorna os campos customizados de um módulo
     *
     * @return mixed
     * @throws InvalidResourceException
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