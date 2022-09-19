<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class CategoriaLojaRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar vínculos de categoria
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public static function fetchAll(): string
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
        if (is_null($id) || is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('categoriasLoja/%s/%s', Bling::$idLoja, $id);
    }

    /**
     * Retorna endpoint para inserir um vínculo de categoria
     *
     * @param mixed|null $id
     * @return string
     * @throws InvalidArgumentException
     */
    public static function insert(mixed $id = null): string
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
     * @return string
     * @throws InvalidArgumentException
     */
    public static function update(int $id): string
    {
        if (is_null($id) || is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('categoriasLoja/%s/%s', Bling::$idLoja, $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna o endpoint para deletar um vínculo de categoria
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