<?php

namespace LojaVirtual\Bling\Tests\unit;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Resources\CategoriaResource;

class BlingTest extends BaseTesting
{
    private string $fakeToken = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';

    public function testInstanceByStaticMethod(): void
    {
        $bling = Bling::client($this->fakeToken);
        self::assertInstanceOf(Bling::class, $bling);
    }

    public function testGetBaseUri(): void
    {
        self::assertEquals('https://bling.com.br/Api/v2/', Bling::getBaseURI());
    }

    public function testGetTimeout(): void
    {
        self::assertEquals(1.0, Bling::getTimeout());
    }

    public function testGetFormat(): void
    {
        self::assertEquals('json', Bling::getFormat());
    }

    public function testGetToken(): void
    {
        $bling = Bling::client($this->fakeToken);
        self::assertEquals($this->fakeToken, Bling::$token);
    }

    public function testCallInvalidResourceMustThrowsInvalidResourceException(): void
    {
        self::expectException(InvalidResourceException::class);
        $bling = Bling::client($this->fakeToken);
        $nonExist = $bling->non_exists();
    }

    public function testCallDinamicResource(): void
    {
        $bling = Bling::client($this->fakeToken);
        $categoriaResource = $bling->categoria();
        self::assertInstanceOf(CategoriaResource::class, $categoriaResource);
    }
}