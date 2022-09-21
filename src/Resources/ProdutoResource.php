<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Request\HttpMethodsEnum;
use LojaVirtual\Bling\Routes\ProdutoRoute;

class ProdutoResource extends AbstractResource implements ResourceInterface
{
    /**
     * Buscar um produto específico
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function fetch(): mixed
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                ProdutoRoute::fetch(...$this->getOptions())
            );

        return $this->resourceResponseHandler->parse($response);
    }

    /**
     * Buscar todos os produtos
     *
     * @return array
     * @throws GuzzleException
     */
    public function fetchAll(): array
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                ProdutoRoute::fetchAll()
            );

        return $this->resourceResponseHandler->parse($response);
    }

    /**
     * Inserir um novo produto
     *
     * @param array $payload
     * @return mixed
     * @throws GuzzleException
     */
    public function insert(array $payload): mixed
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::POST->value,
                ProdutoRoute::insert(),
                array(
                    'xml' => $this->payloadToXML($payload, 'produto')
                )
            );

        return $this->resourceResponseHandler->parse($response);
    }

    /**
     * Atualizar um produto
     *
     * @param array $payload
     * @return mixed
     * @throws GuzzleException
     */
    public function update(array $payload): mixed
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::POST->value,
                ProdutoRoute::update(...$this->getOptions()),
                array(
                    'xml' => $this->payloadToXML($payload, 'produto')
                )
            );

        return $this->resourceResponseHandler->parse($response);
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
