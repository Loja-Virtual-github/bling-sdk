<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Request\HttpMethodsEnum;
use LojaVirtual\Bling\Routes\CampoCustomizadoRoute;

class CampoCustomizadoResource extends AbstractResource implements ResourceInterface
{
    public const PRODUTOS = 'Produtos';
    public const CONTATOS = 'Contatos';

    /**
     * Retorna os campos customizados de um módulo
     *
     * @param string $modulo
     * @return object
     * @throws GuzzleException
     * @throws BlingException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetch(string $modulo): object
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                CampoCustomizadoRoute::fetch($modulo)
            );

        $responseParsed = $this->parseResponse($response, 'camposcustomizados');
        return $responseParsed;
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function fetchAll(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function insert(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return void
     * @throws InvalidEndpointException[
     */
    public function update(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL]
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function delete(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}