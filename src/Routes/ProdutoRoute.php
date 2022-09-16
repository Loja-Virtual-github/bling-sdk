<?php

namespace LojaVirtual\Bling\Routes;

abstract class ProdutoRoute implements RouteInterface
{

    /**
     * Retorna endpoint para buscar todos os produtos
     *
     * @param int|null $id
     * @return string
     */
    public static function fetchAll(?int $id = null): string
    {
        return 'produtos';
    }

    /**
     * Retorna endpoint para buscar um produto em específico
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf('produto/%s', $id);
    }

    /**
     * Retorna endpoint para inserir um novo produto
     *
     * @param int|null $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return 'produto';
    }

    /**
     * Retorna endpoint para atualizar um produto
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('produto/%s', $id);
    }

    /**
     * Retorna um endpoint para deletar um produto
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function delete(int $id, ?int $idSecundario = null): string
    {
        return sprintf('produto/%s', $id);
    }
}