<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;

class ProdutoLojaRoute extends AbstractRoute implements RouteInterface
{

    /**
     * [INDISPONÍVEL]
     *
     * @return string
     * @throws InvalidEndpointException
     */
    public function fetchAll(): string
    {
        throw new InvalidEndpointException("Endpoint indisponível para esta funcionalidade.");
    }

    /**
     * Retorna endpoint para lista um vinculo de produto específico
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf('produto/%s', current($options));
    }

    /**
     * Retorna endpoint para inserir um novo vínculo de produto
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function insert(): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        $options = $this->getOptions();
        return sprintf('produtoLoja/%s/%s', Bling::$idLoja, current($options));
    }

    /**
     * Retorna endpoint para atualizar um vínculo de produto
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function update(): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        $options = $this->getOptions();
        return sprintf('produtoLoja/%s/%s', Bling::$idLoja, current($options));
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