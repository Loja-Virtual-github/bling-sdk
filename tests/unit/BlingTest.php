<?php

namespace LojaVirtual\Bling\Tests\unit;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Resources\CategoriaResource;

class BlingTest extends BaseTesting
{
    private string $fakeToken = 'aasdadasdasd';

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
        $param = array(
            'descricao' => 'Categoria criadinha',
            'idCategoriaPai' => 0
        );
        $response = $bling->categoria(1, 2, 3)->insert($param);
        exit(var_dump($response->isFail()));
    }
}