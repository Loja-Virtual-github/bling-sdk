<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class CategoriaLojaRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar vinculos de categoria
     *
     * @param int|null $id
     * @return string
     * @throws InvalidArgumentException
     */
    public static function fetchAll(?int $id = null): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("O campo ID da Loja é obrigatório.");
        }

        return sprintf('categoriasLoja/%s', Bling::$idLoja);
    }

    /**
     * Retorna endpoint para buscar um vínculo de categoria específica
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidArgumentException
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        if (is_null($id)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('categoriasLoja/%s/%s', Bling::$idLoja, $id);
    }

    /**
     * Retorna endpoint para inserir um vinculo de categoria
     *
     * @param int|null $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidArgumentException
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("O campo ID da Loja é obrigatório.");
        }

        return sprintf('categoriasLoja/%s', Bling::$idLoja);
    }

    /**
     * Retorna endpoint para atualizar um vínculo de categoria
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidArgumentException
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        if (is_null($id)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('categoriasLoja/%s/%s', Bling::$idLoja, $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna o endpoint para deletar um vínculo de categoria
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