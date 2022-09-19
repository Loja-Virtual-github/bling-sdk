<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class CampoCustomizadoRoute implements RouteInterface
{

    /**
     * [INDISPONÍVEL] - Retorna endpoint para buscar todos campos customizados do módulo
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public static function fetchAll(): string
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
     * @param mixed|null $id
     * @return string
     * @throws InvalidEndpointException
     */
    public static function insert(mixed $id = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL] - Atualiza um campo customizado de um módulo
     *
     * @param int $id
     * @return string
     * @throws InvalidEndpointException
     */
    public static function update(int $id): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL] - Deleta um campo customizado de um módulo
     *
     * @param int $id
     * @return string
     * @throws InvalidEndpointException
     */
    public static function delete(int $id): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}