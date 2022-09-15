<?php

namespace LojaVirtual\Bling\Routes;

abstract class ProdutoRoute implements RouteInterface
{

    public static function fetchAll(?int $id = null): string
    {
        return 'produtos';
    }

    public static function fetch(int $id, ?int $idSecundario = null): string
    {
        return sprintf('produto/%s', $id);
    }

    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return 'produto';
    }

    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('produto/%s', $id);
    }

    public static function delete(int $id, ?int $idSecundario = null): string
    {
        return sprintf('produto/%s', $id);
    }
}