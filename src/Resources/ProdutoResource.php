<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

class ProdutoResource extends AbstractResource implements ResourceInterface
{
    /**
     * Buscar um produto específico
     *
     * @return mixed
     * @throws InvalidEndpointException
     * @throws GuzzleException
     */
    public function fetch(): object
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH)
        );
    }

    /**
     * Buscar todos os produtos
     *
     * @return array
     * @throws GuzzleException
     * @throws InvalidEndpointException
     */
    public function fetchAll(): array
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH_ALL)
        );
    }

    /**
     * Inserir um novo produto
     *
     * @param array $payload
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidEndpointException
     * @throws InvalidResponseFormatException
     */
    public function insert(array $payload): object
    {
        return $this->request(
            HttpMethods::POST,
            $this->getEndpoint(AvailableRoutes::INSERT),
            array(
                'xml' => $this->payloadToXML($payload, 'produto')
            )
        );
    }

    /**
     * Atualizar um produto
     *
     * @param array $payload
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidEndpointException
     * @throws InvalidResponseFormatException
     */
    public function update(array $payload): object
    {
        return $this->request(
            HttpMethods::POST,
            $this->getEndpoint(AvailableRoutes::UPDATE),
            array(
                'xml' => $this->payloadToXML($payload, 'produto')
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
