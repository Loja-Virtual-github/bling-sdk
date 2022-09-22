<?php

namespace PabloSanches\Bling\Tests\unit\Resources;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class PedidoResourceTest extends BaseTesting
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
        return json_decode('
        {
            "cliente": {
              "nome": "'. $this->faker->name() .'",
              "tipoPessoa": "J",
              "endereco": "Rua Visconde de São Gabriel",
              "cpf_cnpj": 0,
              "ie": 3067663000,
              "numero": 392,
              "complemento": "Sala 54",
              "bairro": "Cidade Alta",
              "cep": "95.700-000",
              "cidade": "Bento Gonçalves",
              "uf": "RS",
              "fone": 5481153376,
              "email": "teste@teste.com.br"
            },
            "transporte": {
              "transportadora": "Transportadora XYZ",
              "tipo_frete": "R",
              "servico_correios": "SEDEX - CONTRATO",
              "dados_etiqueta": {
                "nome": "Endereço de entrega",
                "endereco": "Rua Visconde de São Gabriel",
                "numero": 392,
                "complemento": "Sala 59",
                "municipio": "Bento Gonçalves",
                "uf": "RS",
                "cep": "95.700-000",
                "bairro": "Cidade Alta"
              },
              "volumes": {
                "volume": [
                  {
                    "servico": "SEDEX - CONTRATO",
                    "codigoRastreamento": ""
                  },
                  {
                    "servico": "PAC - CONTRATO",
                    "codigoRastreamento": ""
                  }
                ]
              }
            },
            "itens": {
              "item": [
                {
                  "codigo": 1,
                  "descricao": "Caneta 001",
                  "un": "Pç",
                  "qtde": 10,
                  "vlr_unit": 1.68
                },
                {
                  "codigo": 2,
                  "descricao": "Caderno 002",
                  "un": "Un",
                  "qtde": 3,
                  "vlr_unit": 3.75
                },
                {
                  "codigo": 3,
                  "descricao": "Teclado 003",
                  "un": "Cx",
                  "qtde": 7,
                  "vlr_unit": 18.65
                }
              ]
            },
            "parcelas": {
              "parcela": [
                {
                  "data": "01/09/2009",
                  "vlr": 100,
                  "obs": "Teste obs 1"
                },
                {
                  "data": "06/09/2009",
                  "vlr": 50,
                  "obs": ""
                },
                {
                  "data": "11/09/2009",
                  "vlr": 50,
                  "obs": "Teste obs 3"
                }
              ]
            },
            "vlr_frete": 15,
            "vlr_desconto": 10,
            "obs": "Testando o campo observações do pedido",
            "obs_internas": "Testando o campo observações internas do pedido"
          }', true);
    }

    public function testInsertPedido(): mixed
    {
        $payload = $this->getPayload();
        $pedido = $this
            ->bling
            ->pedido()
            ->insert($payload);

        self::assertIsObject($pedido);
        self::assertNotEmpty($pedido);
        self::assertIsNumeric($pedido->numero);

        return $pedido->idPedido;
    }

    /**
     * @depends testInsertPedido
     */
    public function testUpdatePedido(mixed $codigoPedido): void
    {
        $payload = $this->getPayload();
        $payload['cliente']['nome'] = $this->faker->name() . ' | ALTERADO';
        $pedido = $this
            ->bling
            ->pedido($codigoPedido)
            ->update($payload);

        self::assertIsObject($pedido);
        self::assertNotEmpty($pedido);
        self::assertIsNumeric($pedido->numero);
    }

    public function testDeletePedidoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $pedido = $this->bling->pedido(123)->delete();
    }

    public function testFetchPedido(): void
    {
        $pedido = $this
            ->bling
            ->pedido(9)
            ->fetch();

        self::assertIsObject($pedido);
        self::assertNotEmpty($pedido);
        self::assertEquals('Testando o campo observações do pedido', $pedido->observacoes);
    }

    public function testFetchAllPedido(): void
    {
        $pedidos = $this
            ->bling
            ->pedido()
            ->fetchAll();

        self::assertIsArray($pedidos);
        self::assertNotEmpty($pedidos);
    }
}