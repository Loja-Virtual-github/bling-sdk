<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Request\ResponseHandler;

interface RouteInterface
{
    public static function fetchAll(?int $id = null): string;
    public static function fetch(int $id, ?int $idSecundario = null): string;
    public static function insert(?int $id = null, ?int $idSecundario = null): string;
    public static function update (int $id, ?int $idSecundario = null): string;
    public static function delete(int $id, ?int $idSecundario = null): string;
}