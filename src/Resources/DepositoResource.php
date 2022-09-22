<?php

namespace PabloSanches\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Exceptions\InvalidResponseFormatException;
use PabloSanches\Bling\Request\HttpMethods;
use PabloSanches\Bling\Routes\AvailableRoutes;

class DepositoResource extends AbstractResource implements ResourceInterface
{
    /**
     * Retorna um depósito em específico
     *
     * @return object
     * @throws InvalidEndpointException
     * @throws GuzzleException
     */
    public function fetch(): object
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH),
        );
    }

    /**
     * Retorna todos os depósitos
     *
     * @return array
     * @throws GuzzleException
     * @throws InvalidEndpointException
     */
    public function fetchAll(): array
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH_ALL),
        );
    }

    /**
     * Insere um novo depósito
     *
     * @param array $payload
     * @return object
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
                'xml' => $this->payloadToXML(
                    $payload,
                    'deposito'
                )
            )
        );
    }

    /**
     * Atualiza um novo depósito
     *
     * @param array $payload
     * @return object
     * @throws GuzzleException
     * @throws InvalidEndpointException
     * @throws InvalidResponseFormatException
     */
    public function update(array $payload): object
    {
        return $this->request(
            HttpMethods::PUT,
            $this->getEndpoint(AvailableRoutes::UPDATE),
            array(
                'xml' => $this->payloadToXML(
                    $payload,
                    'deposito'
                )
            )
        );
    }

    /**
     * Deleta um depósito
     *
     * @return mixed
     * @throws InvalidEndpointException
     */
    public function delete(): mixed
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}