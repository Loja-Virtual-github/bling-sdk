<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Request\HttpMethodsEnum;
use LojaVirtual\Bling\Routes\SituacaoRoute;

class SituacaoResource extends AbstractResource implements ResourceInterface
{

    /**
     * Busca todas situacoes de venda
     *
     * @return array
     * @throws GuzzleException
     * @throws BlingException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetch(): array
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                SituacaoRoute::fetch('Vendas')
            );

        $responseParsed = $this->parseResponse($response, 'situacao');
        return $this->unwrapFetchAll($responseParsed->situacoes, 'situacao');
    }

    /**
     * [INDISPONÍVEL] Buscar todas situação específica
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function fetchAll(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL] Inserir uma situação
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function insert(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL] Atualizar uma situação
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function update(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    /**
     * [INDISPONÍVEL] Deletar uma situação
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function delete(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}