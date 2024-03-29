<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Exceptions\InvalidResponseFormatException;
use LojaVirtual\Bling\Request\HttpMethods;
use LojaVirtual\Bling\Routes\AvailableRoutes;

class ProdutoResource extends AbstractResource implements ResourceInterface
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
            null,
            false
        );
    }

    /**
     * Buscar todos os produtos
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
     * Retorna somente os produtos com vínculo
     *
     * @param array $response
     * @return array
     */
    private function filterMultiLoja(array $response): array
    {
        return array_filter(
            $response,
            fn($produto) => property_exists($produto, 'produtoLoja') ? $produto : null
        );
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
        $response = $this->request(
            HttpMethods::POST,
            $this->getEndpoint(AvailableRoutes::INSERT),
            array(
                'xml' => $this->payloadToXML($payload, 'produto')
            )
        );

        if (!empty(Bling::$idLoja) && !empty($response->codigo)) {
            $produtoLoja = new ProdutoLojaResource([$response->codigo]);

            $preco = [
                "preco" => $response->preco
            ];

            if (!empty($payload['preco_promocional'])) {
                $preco['precoPromocional'] = $payload['preco_promocional'];
            }

            $payloadMultiloja = [
                'idLojaVirtual' => $payload['id_loja_produto'],
                'preco' => $preco,
                'descricaoVinculo' => sprintf("LJVT_PROD_%s", $response->id),
                'idVinculoLoja' => sprintf("LJVT_PROD_%s", $response->id)
            ];

            if (array_key_exists('categorias_loja', $payload) && is_array($payload['categorias_loja'])) {
                $payloadMultiloja['categoriasLoja']['categoriaLoja'] = array_map(
                    function ($categoria) {
                        return ['idCategoria' => $categoria];
                    },
                    $payload['categorias_loja']
                );
            }

            $produtoLojaResponse = $produtoLoja->insert($payloadMultiloja);
            $response->produto_loja = $produtoLojaResponse;
        }

        return $response;
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
        return $this->request(
            HttpMethods::POST,
            $this->getEndpoint(AvailableRoutes::UPDATE),
            array(
                'xml' => $this->payloadToXML($payload, 'produto')
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
