<?php

namespace LojaVirtual\Bling\Format;

interface FormatInterface
{
    public static function to(array $data, ?string $root = null): string;
    public static function from(string $json): object;
}