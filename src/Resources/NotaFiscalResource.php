<?php

namespace PabloSanches\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Exceptions\InvalidResponseFormatException;
use PabloSanches\Bling\Request\HttpMethods;
use PabloSanches\Bling\Routes\AvailableRoutes;

class NotaFiscalResource extends AbstractResource implements ResourceInterface
{
    /**
     * Buscar uma nota fiscal em específico
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
     * Buscar todas as notas fiscais
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
     * Inserir uma nova nota fiscal
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
                'xml' => $this->payloadToXML($payload, 'pedido')
            )
        );
    }

    /**
     * Atualizar uma nota fiscal
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
                'xml' => $this->payloadToXML($payload, 'pedido')
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