<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

class CategoriaResource extends AbstractResource implements ResourceInterface
{
    /**
     * Retorna uma categoria específica
     *
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidEndpointException
     * @throws InvalidResponseFormatException
     */
    public function fetch(): object
    {
        return $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH)
        );
    }

    /**
     * Retorna todas as categorias
     *
     * @return array
     * @throws GuzzleException
     * @throws InvalidEndpointException
     * @throws InvalidResponseFormatException
     */
    public function fetchAll(): array
    {
        $response = $this->request(
            HttpMethods::GET,
            $this->getEndpoint(AvailableRoutes::FETCH_ALL)
        );

        if (!empty(Bling::$idLoja)) {
            return $this->filterMultiLoja($response);
        }

        return $response;
    }

    /**
     * Retorna somente as categorias que possuem vínculo com a integração informada
     *
     * @param array $response
     * @return array
     * @throws GuzzleException
     * @throws InvalidEndpointException
     */
    private function filterMultiLoja(array $response): array
    {
        $categoriaLojaResource = new CategoriaLojaResource();
        $vinculos = $categoriaLojaResource->fetchAll();
        if (empty($vinculos))  return [];

        $idsVinculados = array_map(
            fn($categoriaLoja) => $categoriaLoja->idCategoria,
            $vinculos
        );

        return array_filter(
            $response,
            fn($categoria) => in_array($categoria->id, $idsVinculados) ? $categoria : null
        );
    }

    /**
     * Insere uma nova categoria
     *
     * @param array $payload
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidEndpointException
     * @throws InvalidResponseFormatException
     */
    public function insert(array $payload): object
    {
        $response = $this->request(
            HttpMethods::POST,
            $this->getEndpoint(AvailableRoutes::INSERT),
            array(
                'xml' => $this->payloadToXML(
                    ['categoria' => $payload],
                    'categorias'
                )
            )
        );

        if (!empty(Bling::$idLoja)) {
            $categoriaLoja = new CategoriaLojaResource();
            $categoriaLoja->insert(array(
                'idCategoria' => $response->id,
                'descricaoVinculo' => $payload['descricao'],
                'idVinculoLoja' => sprintf("LJVT_CAT_%s", $response->id),
            ));
        }

        return $response;
    }

    /**
     * Atualizar uma categoria
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
                    ['categoria' => $payload],
                    'categorias'
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
