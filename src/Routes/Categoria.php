<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class Categoria implements RouteInterface
{
    public static function fetchAll(?int $id = null): string
    {
        return '/categorias';
    }

    public static function fetch(int $id, ?int $idSecundario = null): string
    {
        return sprintf("/categoria/%s", $id);
    }

    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return '/categorias';
    }

    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/categoria/%s', $id);
    }

    public static function delete(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}
