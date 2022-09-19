<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class ProdutoLojaRoute implements RouteInterface
{

    /**
     * [INDISPONÍVEL] - Retorna todos produtos loja
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public static function fetchAll(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * Retorna endpoint para lista um vinculo de produto específico
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
     * Retorna endpoint para inserir um novo vínculo de produto
     *
     * @param int|null $id
     * @return string
     * @throws InvalidArgumentException
     */
    public static function insert(mixed $id = null): string
    {
        if (is_null(Bling::$idLoja) || is_null($id)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('produtoLoja/%s/%s', Bling::$idLoja, $id);
    }

    /**
     * Retorna endpoint para atualizar um vínculo de produto
     *
     * @param int $id
     * @return string
     * @throws InvalidArgumentException
     */
    public static function update(int $id): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('produtoLoja/%s/%s', Bling::$idLoja, $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para excluir um vínculo de um produto
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