<?php

namespace PabloSanches\Bling\Routes;

use PabloSanches\Bling\Exceptions\InvalidEndpointException;

class CampoCustomizadoRoute extends AbstractRoute implements RouteInterface
{
    /**
     * [INDISPONÍVEL]
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function fetchAll(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * Retorna os campos customizados de um determinado módulo
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf('camposcustomizados/%s', current($options));
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function insert(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function update(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function delete(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}