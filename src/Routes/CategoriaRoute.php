<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class CategoriaRoute extends AbstractRoute implements RouteInterface
{

    /**
     * Retorna o endpoint para buscar todas categorias
     *
     * @return string
     */
    public function fetchAll(): string
    {
        return 'categorias';
    }

    /**
     * Retorna endpoint para buscar uma categoria em específico
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf("categoria/%s", current($options));
    }

    /**
     * Retorna endpoint para inserir uma nova categoria
     *
     * @return string
     */
    public function insert(): string
    {
        return 'categoria';
    }

    /**
     * Retorna endpoint para atualizar uma categoria
     *
     * @return string
     */
    public function update(): string
    {
        $options = $this->getOptions();
        return sprintf('categoria/%s', current($options));
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function delete(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}
