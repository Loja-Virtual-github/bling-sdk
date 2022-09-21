<?php

namespace LojaVirtual\Bling\Tests\unit\Resources;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ContatoResourceTest extends BaseTesting
{
    private string $token = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';
    private int $idLoja = 204159108;

    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bling = $bling = Bling::client($this->token, $this->idLoja);
        parent::__construct($name, $data, $dataName);
    }

    public function getContatoPayload(): array
    {
        return  array(
            'nome' => $this->faker->name(),
            'fantasia' => $this->faker->word(),
            'tipoPessoa' => 'F',
            'contribuinte' => 9,
            'cpf_cnpj' => $this->faker->cpf(),
            'ie_rg' => $this->faker->rg(),
            'endereco' => $this->faker->streetAddress(),
            'numero' => $this->faker->unique()->randomDigit(),
            'complemento' => '',
            'bairro' => $this->faker->citySuffix(),
            'cep' => $this->faker->postcode(),
            'cidade' => $this->faker->city(),
            'uf' => $this->faker->state(),
            'fone' => $this->faker->phoneNumber(),
            'celular' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'emailNfe' => $this->faker->email(),
            'informacaoContato' => '',
            'limiteCredito' => 0,
            'tipos_contatos' => array(
                'tipo_contato' => [
                    'descricao' => 'Cliente'
                ]
            ),
        );
    }

    public function testCreateNewContato(): int
    {
        $contato = $this
            ->bling
            ->contato()
            ->insert($this->getContatoPayload());

        self::assertIsObject($contato);
        self::assertObjectHasAttribute('id', $contato);
        self::assertIsNumeric($contato->id);

        return $contato->id;
    }

    /**
     * @depends testCreateNewContato
     */
    public function testUdpateAnContato(int $idContato): void
    {
        $contatoPayload = $this->getContatoPayload();
        $contatoPayload['nome'] = 'NOME ALTERADO';
        $contato = $this
            ->bling
            ->contato($idContato)
            ->update($contatoPayload);

        self::assertNotEmpty($contato);
        self::assertIsObject($contato);
        self::assertEquals('NOME ALTERADO', $contato->nome);
    }

    public function testDeleteAnContatoMustThrowAInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->contato(123)->delete();
    }
}