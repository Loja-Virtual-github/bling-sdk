<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\ProdutoLojaRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ProdutoLojaRouteTest extends BaseTesting
{
    public function testCallFetchAllWithoutIdMustReturnInvalidArgumentsException()
    {
        self::expectException(InvalidArgumentException::class);
        $endpoint = ProdutoLojaRoute::fetchAll();
    }

    public function testCallFetchAllWithIdMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::fetchAll($id);
        self::assertEquals("/produto/$id", $endpoint);
    }

    public function testCallFetchWithValidParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::fetch($id);
        self::assertEquals("/produto/$id", $endpoint);
    }

    public function testCallInsertWithoutIdMustThrowsInvalidArgumentsException()
    {
        self::expectException(InvalidArgumentException::class);
        $endpoint = ProdutoLojaRoute::insert();
    }

    public function testCallInsertWithAllParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $idSecundario = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::insert($id, $idSecundario);
        self::assertEquals("/produtoLoja/$id/$idSecundario", $endpoint);
    }

    public function testCallUpdateWithoutCategoryIdMustThrowsInvalidArgumentException()
    {
        self::expectException(InvalidArgumentException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::update($id);
    }

    public function testCallUpdateWithValidParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $idSecundario = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::update($id, $idSecundario);
        self::assertEquals("/produtoLoja/$id/$idSecundario", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoLojaRoute::delete($id);
    }
}