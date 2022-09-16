<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class PedidoRoute implements RouteInterface
{

    /**
     * Retorna endpoint para buscar todos os pedidos
     *
     * @param int|null $id
     * @return string
     */
    public static function fetchAll(?int $id = null): string
    {
        return 'pedidos';
    }

    /**
     * Retorna endpoint para buscar um pedido específico
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf('pedido/%s', $id);
    }

    /**
     * Retorna endpoint para inserir um novo pedido
     *
     * @param int|null $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return 'pedido';
    }

    /**
     * Retorna um endpoint para atualizar um pedido
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('pedido/%s', $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para excluir um pedido
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     * @throws InvalidEndpointException
     */
    public static function delete(int $id, ?int $idSecundario = null): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}