<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class ContatoRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar todos os contatos
     *
     * @param int|null $id
     * @return string
     */
    public static function fetchAll(?int $id = null): string
    {
        return 'contatos';
    }

    /**
     * Retorna o endpoint para buscar um contato em específico
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf('contato/%s', $id);
    }

    /**
     * Retorna endpoint para inserir um novo contato
     *
     * @param int|null $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function insert(?int $id = null, ?int $idSecundario = null): string
    {
        return 'contato';
    }

    /**
     * Retorna endpoint para atualizar um contato
     *
     * @param int $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function update(int $id, ?int $idSecundario = null): string
    {
        return sprintf('contato/%s', $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna o endpoint para deletar um contato
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