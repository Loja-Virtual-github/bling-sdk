<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class DepositoRoute extends AbstractRoute implements RouteInterface
{
    /**
     * Retorna todos os depósitos
     *
     * @return string
     */
    public function fetchAll(): string
    {
        return 'depositos';
    }

    /**
     * Busca um depósito em específico
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf('deposito/%s', current($options));
    }

    /**
     * Insere um novo depósito
     *
     * @return string
     */
    public function insert(): string
    {
        return 'deposito';
    }

    /**
     * Atualiza um depósito
     *
     * @return string
     */
    public function update(): string
    {
        $options = $this->getOptions();
        return sprintf('deposito/%s', current($options));
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
