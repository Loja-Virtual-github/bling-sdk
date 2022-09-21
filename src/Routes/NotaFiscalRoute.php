<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class NotaFiscalRoute extends AbstractRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar todas as notas fiscais
     *
     * @return string
     */
    public function fetchAll(): string
    {
        return 'notasfiscais';
    }

    /**
     * Retorna endpoint para buscar uma determinada nota fiscal
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf('notafiscal/%s/%s', current($options), end($options));
    }

    /**
     * Retorna endpoint para buscar um relatório de notas fiscais
     *
     * @return string
     */
    public function fetchRelatorios(): string
    {
        return 'relatorios/nfe.xml.php';
    }

    /**
     * Retorna endpoint para inserir uma nova nota fiscal
     *
     * @return string
     */
    public function insert(): string
    {
        return 'notafiscal';
    }

    /**
     * Retorna endpoint para atualizar uma nota fiscal
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function update(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
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