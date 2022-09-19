<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\ProdutoLojaRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ProdutoLojaRouteTest extends BaseTesting
{
    public function testCallFetchWithIdMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::fetch($id);
        self::assertEquals("produto/$id", $endpoint);
    }

    public function testCallFetchAllMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::fetchAll($id);
    }

    public function testCallInsertWithAllParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $bling = Bling::client('token', 123412);
        $endpoint = ProdutoLojaRoute::insert($id);
        self::assertEquals("produtoLoja/123412/$id", $endpoint);
    }

    public function testCallUpdateWithValidParamsMustReturnEndpoint()
    {
        $bling = Bling::client('token', 123412);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::update($id);
        self::assertEquals("produtoLoja/123412/$id", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::delete($id);
    }
}