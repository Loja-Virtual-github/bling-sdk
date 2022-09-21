<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Request\HttpMethodsEnum;
use LojaVirtual\Bling\Routes\CategoriaRoute;

class CategoriaResource extends AbstractResource implements ResourceInterface
{
    /**
     * Busca uma categoria específica
     *
     * @return mixed
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetch(): array
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                CategoriaRoute::fetch(...$this->getOptions())
            );

        $responseParsed = $this->parseResponse($response, 'categorias');
        return $responseParsed->categorias[0]->categoria;
    }

    /**
     * Busca todas as categorias
     *
     * @return array
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetchAll(): array
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                CategoriaRoute::fetchAll()
            );

        $responseParsed = $this->parseResponse($response, 'categorias');
        return $this->unwrapFetchAll($responseParsed->categorias, 'categoria');
    }

    /**
     * Insere uma nova categoria
     *
     * @param array $params
     * @return object
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function insert(array $params): object
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::POST->value,
                CategoriaRoute::insert(),
                array(
                    'xml' => $this->payloadToXML(['categoria' => $params], 'categorias')
                )
            );

        $responseParsed = $this->parseResponse($response, 'categorias');
        return $responseParsed->categorias[0][0]->categoria;
    }

    /**
     * Atualizar uma categoria
     *
     * @param array $params
     * @return object
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function update(array $params): object
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::PUT->value,
                CategoriaRoute::update(...$this->getOptions()),
                array(
                    'xml' => $this->payloadToXML(['categoria' => $params], 'categorias')
                )
            );

        $responseParsed = $this->parseResponse($response, 'categorias');
        return $responseParsed->categorias[0][0]->categoria;
    }

    /**
     * [INDISPONÍVEL] Deletar uma categoria
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function delete(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}
