<?php

namespace PabloSanches\Bling\Format;

interface FormatInterface
{
    public function to(array $data, ?string $root = null): string;
    public function from(string $data): object;
}