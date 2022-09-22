<?php

namespace PabloSanches\Bling\Routes;

class ProdutoRoute extends AbstractRoute implements RouteInterface
{

    /**
     * Retorna endpoint para buscar todos os produtos
     *
     * @return string
     */
    public function fetchAll(): string
    {
        return 'produtos';
    }

    /**
     * Retorna endpoint para buscar um produto em específico
     *
     * @return string
     */
    public function fetch(): string
    {
        $options = $this->getOptions();
        return sprintf('produto/%s', current($options));
    }

    /**
     * Retorna endpoint para inserir um novo produto
     *
     * @return string
     */
    public function insert(): string
    {
        return 'produto';
    }

    /**
     * Retorna endpoint para atualizar um produto
     *
     * @return string
     */
    public function update(): string
    {
        $options = $this->getOptions();
        return sprintf('produto/%s', current($options));
    }

    /**
     * Retorna um endpoint para deletar um produto
     *
     * @return string
     */
    public function delete(): string
    {
        $options = $this->getOptions();
        return sprintf('produto/%s', current($options));
    }
}