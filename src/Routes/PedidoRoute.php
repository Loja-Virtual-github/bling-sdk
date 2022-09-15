<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class PedidoRoute implements RouteInterface
{

    public static function fetchAll(?int $id = null): string
    {
        return '/pedidos';
    }

    public static function fetch(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/pedido/%s', $id);
    }

    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return '/pedido';
    }

    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/pedido/%s', $id);
    }

    public static function delete(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}