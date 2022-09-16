<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class CampoCustomizadoRoute implements RouteInterface
{

    /**
     * [INDISPONÍVEL] - Retorna endpoint para buscar todos campos customizados do módulo
     *
     * @param int|null $id
     * @return string
     * @throws InvalidEndpointException
     */
    public static function fetchAll(?int $id = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * Retorna os campos customizados de um determinado módulo
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf('camposcustomizados/%s', $id);
    }

    /**
     * [INDISPONÍVEL] - Insere um novo campo customizado
     *
     * @param int|null $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidEndpointException
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL] - Atualiza um campo customizado de um módulo
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidEndpointException
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL] - Deleta um campo customizado de um módulo
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidEndpointException
     */
    public static function delete(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}