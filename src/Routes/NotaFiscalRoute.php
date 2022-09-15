<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class NotaFiscalRoute implements RouteInterface
{
    public static function fetchAll(?int $id = null): string
    {
        return '/notasfiscais';
    }

    public static function fetch(int $id, ?int $idSecundario = null): string
    {
        return sprintf('/notafiscal/%s/%s', $id, $idSecundario);
    }

    public static function fetchRelatorios(): string
    {
        return '/relatorios/nfe.xml.php';
    }

    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return '/notafiscal';
    }

    public static function insertNumeroSerie(int $numero, int $serie): string
    {
        return sprintf('/notafiscal/%s/%s', $numero, $serie);
    }

    public static function update(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    public static function delete(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}