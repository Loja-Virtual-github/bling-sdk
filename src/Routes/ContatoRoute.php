<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class ContatoRoute extends AbstractRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar todos os contatos
     *
     * @return string
     */
    public function fetchAll(): string
    {
        return 'contatos';
    }

    /**
     * Retorna o endpoint para buscar um contato em específico
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf('contato/%s', current($options));
    }

    /**
     * Retorna endpoint para inserir um novo contato
     *
     * @return string
     */
    public function insert(): string
    {
        return 'contato';
    }

    /**
     * Retorna endpoint para atualizar um contato
     *
     * @return string
     */
    public function update(): string
    {
        $options = $this->getOptions();
        return sprintf('contato/%s', current($options));
    }

    /**
     * [INDISPONÍVEL] - Retorna o endpoint para deletar um contato
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function delete(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }
}