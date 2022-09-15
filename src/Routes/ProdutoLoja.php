<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class ProdutoLoja extends AbstractRoute implements RouteInterface
{

    public static function fetchAll(?int $id = null): string
    {
        return sprintf('/produto/%s', $id);
    }

    public static function fetch(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/produto/%s', $id);
    }

    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return sprintf('/produtoLoja/%s/%s', $id, $idSecundario);
    }

    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/produtoLoja/%s/%s', $id, $idSecundario);
    }

    public static function delete(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}