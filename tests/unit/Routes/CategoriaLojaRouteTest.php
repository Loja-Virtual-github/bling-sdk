<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidArgumentException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\CategoriaLojaRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class CategoriaLojaRouteTest extends BaseTesting
{
    public function testCallFetchAllWithoutIdMustReturnInvalidArgumentsException()
    {
        self::expectException(InvalidArgumentException::class);
        $endpoint = CategoriaLojaRoute::fetchAll();
    }

    public function testCallFetchAllWithIdMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::fetchAll($id);
        self::assertEquals("categoriasLoja/$id", $endpoint);
    }

    public function testCallFetchWithoutCategoryIdMustThrowsInvalidArgumentException()
    {
        self::expectException(InvalidArgumentException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::fetch($id);
    }

    public function testCallFetchWithValidParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $idSecundario = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::fetch($id, $idSecundario);
        self::assertEquals("categoriasLoja/$id/$idSecundario", $endpoint);
    }

    public function testCallInsertWithoutIdMustThrowsInvalidArgumentsException()
    {
        self::expectException(InvalidArgumentException::class);
        $endpoint = CategoriaLojaRoute::insert();
    }

    public function testCallInsertWithAllParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::insert($id);
        self::assertEquals("categoriasLoja/$id", $endpoint);
    }

    public function testCallUpdateWithoutCategoryIdMustThrowsInvalidArgumentException()
    {
        self::expectException(InvalidArgumentException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::update($id);
    }

    public function testCallUpdateWithValidParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $idSecundario = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::update($id, $idSecundario);
        self::assertEquals("categoriasLoja/$id/$idSecundario", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::delete($id);
    }
}