<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class ContatoRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar todos os contatos
     *
     * @return string
     */
    public static function fetchAll(): string
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
     * @param mixed|null $id
     * @return string
     */
    public static function insert(mixed $id = null): string
    {
        return 'contato';
    }

    /**
     * Retorna endpoint para atualizar um contato
     *
     * @param int $id
     * @return string
     */
    public static function update(int $id): string
    {
        return sprintf('contato/%s', $id);
    }

    /**
     * [INDISPONÍVEL] - Retorna o endpoint para deletar um contato
     *
     * @param int $id
     * @return string
     * @throws InvalidEndpointException
     */
    public static function delete(int $id): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}