<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

abstract class NotaFiscalRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar todas as notas fiscais
     *
     * @return string
     */
    public static function fetchAll(): string
    {
        return 'notasfiscais';
    }

    /**
     * Retorna endpoint para buscar uma determinada nota fiscal
     *
     * @param int|string $id
     * @param int|null $idSecundario
     * @return string
     */
    public static function fetch(int|string $id, ?int $idSecundario = null): string
    {
        return sprintf('notafiscal/%s/%s', $id, $idSecundario);
    }

    /**
     * Retorna endpoint para buscar um relatório de notas fiscais
     *
     * @return string
     */
    public static function fetchRelatorios(): string
    {
        return 'relatorios/nfe.xml.php';
    }

    /**
     * Retorna endpoint para inserir uma nova nota fiscal
     *
     * @param mixed|null $id
     * @return string
     */
    public static function insert(mixed $id = null): string
    {
        return 'notafiscal';
    }

    /**
     * Retorna endpoint para inserir uma nota fiscal com número e série definidos
     *
     * @param int $numero
     * @param int $serie
     * @return string
     */
    public static function insertNumeroSerie(int $numero, int $serie): string
    {
        return sprintf('notafiscal/%s/%s', $numero, $serie);
    }

    /**
     * Retorna endpoint para atualizar uma nota fiscal
     *
     * @param int $id
     * @return string
     * @throws InvalidEndpointException
     */
    public static function update(int $id): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * [INDISPONÍVEL] - Retorna endpoint para deletar uma nota fiscal
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