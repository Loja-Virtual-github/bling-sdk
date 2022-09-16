<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class CategoriaRoute implements RouteInterface
{

    /**
     * Retorna o endpoint para buscar todas categorias
     *
     * @param int|null $id
     * @return string
     */
    public static function fetchAll(?int $id = null): string
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
     * @param int|null $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return 'categoria';
    }

    /**
     * Retorna endpoint para atualizar uma categoria
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('categoria/%s', $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para deletar uma categoria
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
