<?php
//
//namespace PabloSanches\Bling\Tests\unit\Resources;
//
//use PabloSanches\Bling\Bling;
//use PabloSanches\Bling\Exceptions\InvalidEndpointException;
//use PabloSanches\Bling\Tests\unit\BaseTesting;
//
//class NotaFiscalTest extends BaseTesting
//{
//    private string $token = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';
//    private int $idLoja = 204159108;
//    private Bling $bling;
//
//    public function __construct(?string $name = null, array $data = [], $dataName = '')
//    {
//        $this->bling = $bling = Bling::client($this->token, $this->idLoja);
//        parent::__construct($name, $data, $dataName);
//    }
//
//    public function getPayload(): array
//    {
//        return json_decode('
//            {
//                "cliente": {
//                  "nome": "Organisys Software",
//                  "tipoPessoa": "J",
//                  "cpf_cnpj": 0,
//                  "ie_rg": 3067663000,
//                  "endereco": "Rua Visconde de São Gabriel",
//                  "numero": 392,
//                  "complemento": "Sala 54",
//                  "bairro": "Cidade Alta",
//                  "cep": "95.700-000",
//                  "cidade": "Bento Gonçalves",
//                  "uf": "RS",
//                  "fone": "54 8115-3376",
//                  "email": "teste@teste.com.br"
//                },
//                "transporte": {
//                  "transportadora": "Transportadora XYZ",
//                  "cpf_cnpj": 11122233345,
//                  "ie_rg": 1122334455,
//                  "endereco": "Rua Silvio Orlandini, 435",
//                  "cidade": "Roca Sales",
//                  "uf": "RS",
//                  "placa": "ILM-1020",
//                  "uf_veiculo": "RS",
//                  "tipo_frete": "R",
//                  "qtde_volumes": 10,
//                  "especie": "Volumes",
//                  "numero": 425,
//                  "peso_bruto": 157,
//                  "peso_liquido": 142,
//                  "servico_correios": "SEDEX",
//                  "dados_etiqueta": {
//                    "nome": "Endereço de entrega",
//                    "endereco": "Rua Visconde de São Gabriel",
//                    "numero": 392,
//                    "complemento": "Sala 59",
//                    "municipio": "Bento Gonçalves",
//                    "uf": "RS",
//                    "cep": "95.700-000",
//                    "bairro": "Cidade Alta"
//                  },
//                  "volumes": {
//                    "volume": [
//                      {
//                        "servico": "SEDEX - CONTRATO",
//                        "codigoRastreamento": ""
//                      },
//                      {
//                        "servico": "PAC - CONTRATO",
//                        "codigoRastreamento": ""
//                      }
//                    ]
//                  }
//                },
//                "itens": {
//                  "item": [
//                    {
//                      "codigo": 1,
//                      "descricao": "Caneta 001",
//                      "un": "Pç",
//                      "qtde": 10,
//                      "vlr_unit": 1.68,
//                      "tipo": "P",
//                      "peso_bruto": 0.2,
//                      "peso_liq": 0.18,
//                      "class_fiscal": "1000.00.10",
//                      "origem": 0
//                    },
//                    {
//                      "codigo": 2,
//                      "descricao": "Caderno 002",
//                      "un": "Un",
//                      "qtde": 3,
//                      "vlr_unit": 3.75,
//                      "tipo": "P",
//                      "peso_bruto": 0.75,
//                      "peso_liq": 0.7,
//                      "class_fiscal": "1000.00.10",
//                      "origem": 0
//                    },
//                    {
//                      "codigo": 3,
//                      "descricao": "Teclado 003",
//                      "un": "Cx",
//                      "qtde": 7,
//                      "vlr_unit": 18.65,
//                      "tipo": "P",
//                      "peso_bruto": 0.65,
//                      "peso_liq": 0.52,
//                      "class_fiscal": "1000.00.10",
//                      "origem": 0
//                    }
//                  ]
//                },
//                "parcelas": {
//                  "parcela": [
//                    {
//                      "dias": 10,
//                      "data": "01/09/2009",
//                      "vlr": 100,
//                      "obs": "Teste obs 1"
//                    },
//                    {
//                      "dias": 15,
//                      "data": "06/09/2009",
//                      "vlr": 50,
//                      "obs": ""
//                    },
//                    {
//                      "dias": 20,
//                      "data": "11/09/2009",
//                      "vlr": 50,
//                      "obs": "Teste obs 3"
//                    }
//                  ]
//                },
//                "nf_produtor_rural_referenciada": {
//                  "numero": 1020,
//                  "serie": 0,
//                  "ano_mes_emissao": 1202
//                },
//                "vlr_frete": 15,
//                "vlr_seguro": 7,
//                "vlr_despesas": 2.5,
//                "vlr_desconto": 10,
//                "obs": "Testando o campo observações do pedido"
//              }
//        ', true);
//    }
//
//    public function testInsertNotaFiscal(): mixed
//    {
//        $payload = $this->getPayload();
//        $notaFiscal = $this
//            ->bling
//            ->nota_fiscal()
//            ->insert($payload);
//        exit(var_dump($notaFiscal));
//    }
//
//    public function testUpdateNotaFiscal(): void
//    {
//        self::fail('Não implementado');
//    }
//
//    public function testDeleteNotaFiscalMustThrowsInvalidEndpointException(): void
//    {
//        self::expectException(InvalidEndpointException::class);
//        $this->bling->nota_fiscal(123)->delete();
//    }
//
//    public function testFetchNotaFiscal(): void
//    {
//        self::fail('Não implementado');
//    }
//
//    public function testFetchAllNotaFiscal(): void
//    {
//        self::fail('Não implementado');
//    }
//}