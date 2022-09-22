<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

class ContatoResource extends AbstractResource implements ResourceInterface
{
    /**
     * Tipo de identificador para buscar um contato
     */
    protected const TIPO_IDENTIFICADO = [
        'cpf_cnpj' => '1',
        'id' => '2'
    ];

    /**
     * Busca um contato específico
     *
     * @return object
     * @throws InvalidEndpointException
     * @throws GuzzleException
     */
    public function fetch(): object
    {
        $options = $this->getOptions();
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH),
            array(
                'identificador' => $this->getTipoIdentificador(current($options))
            )
        );
    }

    /**
     * Retorna o tipo de identificador
     *
     * @param mixed $identificador
     * @return int
     */
    public function getTipoIdentificador(mixed $identificador): int
    {
        return is_numeric($identificador)
            ? self::TIPO_IDENTIFICADO['id']
            : self::TIPO_IDENTIFICADO['cpf_cnpj'];
    }

    /**
     * Retorna todos os contatos
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
     * Inserir um novo contato
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
                    'contato'
                )
            )
        );
    }

    /**
     * Atualiza um contato
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
                    'contato'
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