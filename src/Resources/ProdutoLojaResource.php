<?php

namespace PabloSanches\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Exceptions\InvalidResponseFormatException;
use PabloSanches\Bling\Request\HttpMethods;
use PabloSanches\Bling\Routes\AvailableRoutes;

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
        if (empty($payload['idPabloSanches'])) {
            $payload['idPabloSanches'] = Bling::$idLoja;
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
        if (empty($payload['idPabloSanches'])) {
            $payload['idPabloSanches'] = Bling::$idLoja;
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
