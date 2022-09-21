<?php

namespace LojaVirtual\Bling\Routes;

interface RouteInterface
{
    public function fetchAll(): string;
    public function fetch(): string;
    public function insert(): string;
    public function update (): string;
    public function delete(): string;
}