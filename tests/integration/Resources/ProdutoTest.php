<?php

namespace LojaVirtual\Bling\Tests\unit\Resources;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ProdutoTest extends BaseTesting
{
    private string $token = 'c1610a54e2612543827cfa5277636e21b6da6e8ff19ff5a17b64aefafdd8474e382327a8';
    private int $idLoja = 204195687;

    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bling = $bling = Bling::client($this->token, $this->idLoja);
        parent::__construct($name, $data, $dataName);
    }

    private function getDadosProduto()
    {
        return json_decode('
            {
              "produto": {
                "codigo": 5827317,
                "descricao": "Caneta 001",
                "descricaoCurta": "Descrição curta da caneta",
                "descricaoComplementar": "Descrição complementar da caneta",
                "un": "Pc",
                "vlr_unit": 1.68,
                "preco_custo": 1.23,
                "peso_bruto": 0.2,
                "peso_liq": 0.18,
                "class_fiscal": [
                  "1000.01.01",
                  "1111.11.11"
                ],
                "marca": "Marca da Caneta",
                "origem": 0,
                "gtin": 223435780,
                "gtinEmbalagem": 54546,
                "largura": 11,
                "altura": 21,
                "profundidade": 31,
                "estoqueMinimo": 1,
                "estoqueMaximo": 100,
                "cest": "28.040.00",
                "idGrupoProduto": 12345,
                "condicao": "Usado",
                "freteGratis": "S",
                "linkExterno": "https://minhaloja.com.br/meu-produto",
                "observacoes": "Observações do meu produto",
                "producao": "P",
                "dataValidade": "20/11/2019",
                "descricaoFornecedor": "Descrição do fornecedor",
                "idFabricante": 0,
                "codigoFabricante": 123,
                "unidadeMedida": "Centímetros",
                "crossdocking": 2,
                "garantia": 4,
                "itensPorCaixa": 2,
                "volumes": 2,
                "urlVideo": "https://www.youtube.com/watch?v=zKKL-SgC5lY",
                "idCategoria": 5827317,
                "variacoes": {
                  "variacao": [
                    {
                      "nome": "Cor:Preto",
                      "codigo": "223435780-Preto",
                      "clonarDadosPai": "S"
                    },
                    {
                      "nome": "Cor:Branco",
                      "codigo": "223435780-Branco",
                      "vlr_unit": 1.5
                    }
                  ]
                },
                "imagens": {
                  "url": "https://www.bling.com.br/bling.jpg"
                }
              }
            }
        ', true);
    }

    public function testInsertProduct(): mixed
    {
        $payloadProduto = $this->getDadosProduto();
        $produto = $this
            ->bling
            ->produto()
            ->insert($payloadProduto);

        self::assertNotEmpty($produto);
        self::assertEquals('5827317', $produto->codigo);
        self::assertEquals('Caneta 001', $produto->descricao);
        self::assertObjectHasAttribute('variacoes', $produto);

        return $produto->codigo;
    }

    /**
     * @depends testInsertProduct
     */
    public function testUpdateProduct(mixed $codigoProduto): mixed
    {
        $payloadProduto = $this->getDadosProduto();
        $payloadProduto['produto']['descricao'] = 'DESCRICAO ALTERADA';
        $produto = $this
            ->bling
            ->produto($codigoProduto)
            ->update($payloadProduto);

        self::assertNotEmpty($produto);
        self::assertEquals('5827317', $produto->codigo);
        self::assertEquals('DESCRICAO ALTERADA', $produto->descricao);

        return $codigoProduto;
    }

    /**
     * @depends testInsertProduct
     */
    public function testDeleteProductMustThrowsInvalidEndpointException(mixed $codigoProduto): void
    {
        self::expectException(InvalidEndpointException::class);
        $produtos = $this
            ->bling
            ->produto($codigoProduto)
            ->delete();
    }

    /**
     * @depends testInsertProduct
     */
    public function testFetchProduct(mixed $codigoProduto): void
    {
        $produto = $this
            ->bling
            ->produto($codigoProduto)
            ->fetch();

        self::assertNotEmpty($produto);
        self::assertIsObject($produto);
        self::assertEquals('5827317', $produto->codigo);
        self::assertEquals('DESCRICAO ALTERADA', $produto->descricao);
    }

    public function testFetchAllProducts(): void
    {
        $produtos = $this
            ->bling
            ->produto()
            ->fetchAll();
        
        self::assertIsArray($produtos);
        self::assertNotEmpty($produtos);
    }
}