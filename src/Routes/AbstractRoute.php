<?php

namespace PabloSanches\Bling\Routes;

abstract class AbstractRoute
{
    protected array $options = [];

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Retorna as opções dos endpoints
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}