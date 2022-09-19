<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class SituacaoRoute implements RouteInterface
{

    /**
     * [INDISPONÍVEL] - Retorna endpoint para listar todas as situações
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public static function fetchAll(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * Retorna endpoint para buscar uma situação específica
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf("situacao/%s", $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para inserir uma nova situação
     *
     * @param mixed $id
     * @return string
     * @throws InvalidEndpointException
     */
    public static function insert(mixed $id = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para atualizar uma situação
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
     * [INDISPONÍVEL] - Retorna endpoint para excluir uma situação
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