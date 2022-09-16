<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class ProdutoLojaRoute implements RouteInterface
{

    /**
     * Retorna endpoint para listar todos vínculos de produtos
     *
     * @param int|null $id
     * @return string
     * @throws InvalidArgumentException
     */
    public static function fetchAll(?int $id = null): string
    {
        if (is_null($id)) {
            throw new InvalidArgumentException("O campo ID da Loja é obrigatório.");
        }

        return sprintf('produto/%s', $id);
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
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidArgumentException
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        if (is_null($id) || is_null($idSecundario)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('produtoLoja/%s/%s', $id, $idSecundario);
    }

    /**
     * Retorna endpoint para atualizar um vinculo de produto
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidArgumentException
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        if (is_null($idSecundario)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('produtoLoja/%s/%s', $id, $idSecundario);
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para excluir um vínculo de um produto
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