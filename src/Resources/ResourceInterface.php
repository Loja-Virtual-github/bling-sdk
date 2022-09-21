<?php

namespace LojaVirtual\Bling\Resources;

interface ResourceInterface
{
    public function fetch(): object;
    public function fetchAll(): array;
    public function insert(array $payload): object;
    public function update(array $payload): object;
    public function delete(): mixed;
}