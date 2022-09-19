<?php

namespace LojaVirtual\Bling\Tests\unit\Resources;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class SituacaoResourceTest extends BaseTesting
{
    private string $token = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';
    private int $idLoja = 204159108;

    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bling = $bling = Bling::client($this->token, $this->idLoja);
        parent::__construct($name, $data, $dataName);
    }

    public function testFetchSituacoes(): void
    {
        $situacoes = $this
            ->bling
            ->situacao()
            ->fetch();
        self::assertIsArray($situacoes);
        self::assertNotEmpty($situacoes);
    }

    public function testFetchAllSituacaoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->situacao()->fetchAll([]);
    }

    public function testInsertSituacaoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->situacao()->insert([]);
    }

    public function testUpdateSituacaoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->situacao(123)->update([]);
    }

    public function testDeleteSituacaoMustThrowsInvalidEndpointException(): void
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->situacao(123)->delete();
    }
}