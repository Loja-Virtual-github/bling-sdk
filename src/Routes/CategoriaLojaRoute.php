<?php

namespace PabloSanches\Bling\Routes;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Exceptions\InvalidArgumentException;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;

class CategoriaLojaRoute extends AbstractRoute implements RouteInterface
{
    /**
     * Retorna endpoint para buscar vínculos de categoria
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function fetchAll(): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("O campo ID da Loja é obrigatório.");
        }

        return sprintf('categoriasLoja/%s', Bling::$idLoja);
    }

    /**
     * Retorna endpoint para buscar um vínculo de categoria específica
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function fetch(): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("Parâmetros inválidos");
        }

        $options = $this->getOptions();
        return sprintf('categoriasLoja/%s/%s', Bling::$idLoja, current($options));
    }

    /**
     * Retorna endpoint para inserir um vínculo de categoria
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function insert(): string
    {
        if (is_null(Bling::$idLoja)) {
            throw new InvalidArgumentException("O campo ID da Loja é obrigatório.");
        }

        return sprintf('categoriasLoja/%s', Bling::$idLoja);
    }

    /**
     * Retorna endpoint para atualizar um vínculo de categoria
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
        return sprintf('categoriasLoja/%s/%s', Bling::$idLoja, current($options));
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