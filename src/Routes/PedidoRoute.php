<?php

namespace PabloSanches\Bling\Routes;

use PabloSanches\Bling\Exceptions\InvalidEndpointException;

class PedidoRoute extends AbstractRoute implements RouteInterface
{

    /**
     * Retorna endpoint para buscar todos os pedidos
     *
     * @return string
     */
    public function fetchAll(): string
    {
        return 'pedidos';
    }

    /**
     * Retorna endpoint para buscar um pedido específico
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf('pedido/%s', current($options));
    }

    /**
     * Retorna endpoint para inserir um novo pedido
     *
     * @return string
     */
    public function insert(): string
    {
        return 'pedido';
    }

    /**
     * Retorna um endpoint para atualizar um pedido
     *
     * @return string
     */
    public function update(): string
    {
        $options = $this->getOptions();
        return sprintf('pedido/%s', current($options));
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