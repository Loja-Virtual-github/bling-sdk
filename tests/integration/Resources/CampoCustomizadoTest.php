<?php

namespace PabloSanches\Bling\Tests\unit\Resources;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Resources\CampoCustomizadoResource;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class CampoCustomizadoTest extends BaseTesting
{
    private string $token = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';

    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bling = $bling = Bling::client($this->token);
        parent::__construct($name, $data, $dataName);
    }

    public function testInsertCampoCustomizadoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->campo_customizado()->insert([]);
    }

    public function testUpdateCampoCustomizadoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->campo_customizado(123)->update([]);
    }

    public function testDeleteCampoCustomizadoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->campo_customizado(123)->delete();
    }

    public function testFetchAllCampoCustomizadoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->campo_customizado()->fetchAll();
    }

    public function testFetchCampoCustomizadoProdutos(): void
    {
        $campoCustomizado = $this
            ->bling
            ->campo_customizado(CampoCustomizadoResource::PRODUTOS)
            ->fetch();

        self::assertEquals('teste', $campoCustomizado->alias);
        self::assertEquals('Teste', $campoCustomizado->nome);
        self::assertEquals('Testando o campo', $campoCustomizado->descricao);
    }
}