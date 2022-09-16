<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Routes\CategoriaLojaRoute;
use LojaVirtual\Bling\Routes\CategoriaRoute;

class CategoriaLojaResource extends AbstractResource implements ResourceInterface
{
    /**
     * Retorna um vinculo de categoria loja
     *
     * @return object
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetch(): object
    {
        $response = $this->request
            ->sendRequest(
                Request::GET,
                CategoriaLojaRoute::fetch(...$this->getOptions())
            );

        $responseParsed = $this->parseResponse($response);
        return $responseParsed->categoriasLoja[0]->categoriaLoja;
    }

    /**
     * Retorna todas as categorias vinculadas com a loja
     *
     * @return array
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetchAll(): array
    {
        $response = $this->request
            ->sendRequest(
                Request::GET,
                CategoriaLojaRoute::fetchAll(...$this->getOptions())
            );

        $responseParsed = $this->parseResponse($response);
        return $this->unwrapCategoriasLojaFetchAll($responseParsed->categoriasLoja);
    }

    /**
     * Simplifica a lista retornada pela API
     *
     * @param array $categoriasLoja
     * @return array
     */
    private function unwrapCategoriasLojaFetchAll(array $categoriasLoja): array
    {
        $unwrapped = [];
        foreach ($categoriasLoja as $categoriaLoja) {
            if (property_exists($categoriaLoja, 'categoriaLoja')) {
                $unwrapped[] = $categoriaLoja->categoriaLoja;
            }
        }

        return $unwrapped;
    }

    /**
     * Insere um vínculo de categoria com loja
     *
     * @param array $params
     * @return object
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function insert(array $params): object
    {
        $response = $this->request
            ->sendRequest(
                Request::POST,
                CategoriaLojaRoute::insert(...$this->getOptions()),
                array(
                    'xml' => $this->payloadToXML(['categorialoja' => $params], 'categoriasloja')
                )
            );

        $responseParsed = $this->parseResponse($response);
        return $responseParsed->categoriasLoja[0][0]->categoriaLoja;
    }

    /**
     * Atualiza um vinculo de categoria com loja
     *
     * @param array $params
     * @return object
     * @throws GuzzleException
     * @throws BlingException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function update(array $params): object
    {
        $response = $this->request
            ->sendRequest(
                Request::PUT,
                CategoriaLojaRoute::update(...$this->getOptions()),
                array(
                    'xml' => $this->payloadToXML(['categorialoja' => $params], 'categoriasloja')
                )
            );

        $responseParsed = $this->parseResponse($response);
        return $responseParsed->categoriasLoja[0][0]->categoriaLoja;
    }

    /**
     * [INDISPONÍVEL] Deletar um vinculo de categoria com loja
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function delete(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}