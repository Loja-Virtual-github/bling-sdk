<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class ProdutoLojaRoute implements RouteInterface
{

    public static function fetchAll(?int $id = null): string
    {
        if (is_null($id)) {
            throw new InvalidArgumentException("O campo ID da Loja é obrigatório.");
        }

        return sprintf('produto/%s', $id);
    }

    public static function fetch(int $id, ?int $idSecundario = null): string
    {
        return sprintf('produto/%s', $id);
    }

    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        if (is_null($id) || is_null($idSecundario)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('produtoLoja/%s/%s', $id, $idSecundario);
    }

    public static function update(int $id, ?int $idSecundario = null): string
    {
        if (is_null($idSecundario)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        return sprintf('produtoLoja/%s/%s', $id, $idSecundario);
    }

    public static function delete(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}