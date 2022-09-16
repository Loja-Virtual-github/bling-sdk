<?php

namespace LojaVirtual\Bling\Routes;

abstract class FormaPagamentoRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar todas as formas de pagamento
     *
     * @param int|null $id
     * @return string
     */
    public static function fetchAll(?int $id = null): string
    {
        return 'formaspagamento';
    }

    /**
     * Retorna endpoint para buscar uma determinada forma de pagamento
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf('formapagamento/%s', $id);
    }

    /**
     * Retorna endpoint para inserir uma forma de pagamento
     *
     * @param int|null $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return 'formapagamento';
    }

    /**
     * Retorna endpoint para atualizar uma forma de pagamento
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('formapagamento/%s', $id);
    }

    /**
     * Retorna endpoint para excluir uma forma de pagamento
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function delete(int $id, ?int $idSecundario = null): string
    {
        return sprintf('formapagamento/%s', $id);
    }
}