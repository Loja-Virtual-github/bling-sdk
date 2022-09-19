<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Request\ResponseHandler;

interface RouteInterface
{
    public static function fetchAll(): string;
    public static function fetch(int|string $id, ?int $idSecundario = null): string;
    public static function insert(mixed $id = null): string;
    public static function update (int $id): string;
    public static function delete(int $id): string;
}