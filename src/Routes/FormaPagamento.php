<?php

namespace LojaVirtual\Bling\Routes;

abstract class FormaPagamento implements RouteInterface
{
    public static function fetchAll(?int $id = null): string
    {
        return '/formaspagamento';
    }

    public static function fetch(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/formapagamento/%s', $id);
    }

    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return '/formapagamento';
    }

    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/formapagamento/%s', $id);
    }

    public static function delete(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/formapagamento/%s', $id);
    }
}