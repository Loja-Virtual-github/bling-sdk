<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

class ProdutoLojaResource extends AbstractResource implements ResourceInterface
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
            $this->getEndpoint(AvailableRoutes::FETCH),
            array(
                'loja' => Bling::$idLoja
            )
        );
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return array
     * @throws InvalidEndpointException
     */
    public function fetchAll(): array
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
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
        if (empty($payload['idLojaVirtual'])) {
            $payload['idLojaVirtual'] = Bling::$idLoja;
        }

        return $this->request(
            HttpMethods::POST,
            $this->getEndpoint(AvailableRoutes::INSERT),
            array(
                'xml' => $this->payloadToXML(
                    ['produtoLoja' => $payload],
                    'produtosLoja'
                )
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
        if (empty($payload['idLojaVirtual'])) {
            $payload['idLojaVirtual'] = Bling::$idLoja;
        }

        return $this->request(
            HttpMethods::PUT,
            $this->getEndpoint(AvailableRoutes::UPDATE),
            array(
                'xml' => $this->payloadToXML(
                    ['produtoLoja' => $payload],
                    'produtosLoja'
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
