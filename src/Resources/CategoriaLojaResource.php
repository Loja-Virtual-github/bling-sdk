<?php

namespace LojaVirtual\Bling\Resources;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

class CategoriaLojaResource extends AbstractResource implements ResourceInterface
{
    /**
     * Retorna um vinculo de categoria loja
     *
     * @return object
     * @throws InvalidResourceException
     */
    public function fetch(): object
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH)
        );
    }

    /**
     * Retorna todas as categorias vinculadas com a loja
     *
     * @return array
     * @throws InvalidResourceException
     */
    public function fetchAll(): array
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH_ALL)
        );
    }

    /**
     * Insere um vínculo de categoria com loja
     *
     * @param array $payload
     * @return object
     * @throws InvalidResourceException
     */
    public function insert(array $payload): object
    {
        return $this->request(
            HttpMethods::POST,
            $this->getEndpoint(AvailableRoutes::INSERT),
            array(
                'xml' => $this->payloadToXML(
                    ['categorialoja' => $payload],
                    'categoriasloja'
                )
            )
        );
    }

    /**
     * Atualiza um vínculo de categoria com loja
     *
     * @param array $payload
     * @return object
     * @throws InvalidResourceException
     */
    public function update(array $payload): object
    {
        return $this->request(
            HttpMethods::PUT,
            $this->getEndpoint(AvailableRoutes::UPDATE),
            array(
                'xml' => $this->payloadToXML(
                    ['categorialoja' => $payload],
                    'categoriasloja'
                )
            )
        );
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return mixed
     * @throws InvalidEndpointException
     */
    public function delete(): mixed
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}