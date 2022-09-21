<?php

namespace LojaVirtual\Bling\Tests\unit\Resources;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ProdutoLojaTest extends BaseTesting
{
    private string $token = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';
    private int $idLoja = 204159108;
    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bling = $bling = Bling::client($this->token, $this->idLoja);
        parent::__construct($name, $data, $dataName);
    }

    private function getPayload(): array
    {
        return json_decode('{
                  "idLojaVirtual": 204159108,
                  "preco": {
                    "preco": 21,
                    "precoPromocional": 19
                  },
                  "idFornecedor": 0,
                  "idMarca": 21,
                  "categoriasLoja": {
                    "categoriaLoja": [
                      {
                        "idCategoria": 5827317
                      }
                    ]
                  }
                }', true);
    }

    public function testInsertProdutoLoja(): void
    {
        $payload = $this->getPayload();
        $produtoLoja = $this
            ->bling
            ->produto_loja(123)
            ->insert($payload);

        self::assertIsObject($produtoLoja);
        self::assertNotEmpty($produtoLoja);
        self::assertEquals($payload['idMarca'], $produtoLoja->idMarca);
    }

    public function testUpdateProdutoLoja(): void
    {
        $payload = $this->getPayload();
        $payload['idMarca'] = 007;
        $produtoLoja = $this
            ->bling
            ->produto_loja(123)
            ->update($payload);

        self::assertIsObject($produtoLoja);
        self::assertNotEmpty($produtoLoja);
        self::assertEquals($payload['idMarca'], $produtoLoja->idMarca);
    }

    public function testFetchProdutoLoja(): void
    {
        $produtoLoja = $this
            ->bling
            ->produto_loja(123)
            ->fetch();
        self::assertIsObject($produtoLoja);
        self::assertNotEmpty($produtoLoja);
        self::assertEquals('PRODUTO NÃO VINCULADO MULTI', $produtoLoja->descricao);
    }

    public function testDeleteProdutoLojaMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->produto_loja()->delete();
    }

    public function testFetchAllProdutoLojaMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $produtosLoja = $this->bling->produto_loja()->delete();
    }
}