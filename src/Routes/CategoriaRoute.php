<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class CategoriaRoute implements RouteInterface
{

    /**
     * Retorna o endpoint para buscar todas categorias
     *
     * @return string
     */
    public static function fetchAll(): string
    {
        return 'categorias';
    }

    /**
     * Retorna endpoint para buscar uma categoria em específico
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf("categoria/%s", $id);
    }

    /**
     * Retorna endpoint para inserir uma nova categoria
     *
     * @param mixed|null $id
     * @return string
     */
    public static function insert(mixed $id = null): string
    {
        return 'categoria';
    }

    /**
     * Retorna endpoint para atualizar uma categoria
     *
     * @param int $id
     * @return string
     */
    public static function update(int $id): string
    {
        return sprintf('categoria/%s', $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para deletar uma categoria
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
