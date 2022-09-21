<?php

namespace LojaVirtual\Bling\Routes;

abstract class AbstractRoute
{
    protected array $options = [];

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Seta as opções do endpoint
     *
     * @param array $options
     * @return void
     */
    public function setOptions(array $options): void
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