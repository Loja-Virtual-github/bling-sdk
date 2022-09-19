<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\CategoriaLojaRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class CategoriaLojaRouteTest extends BaseTesting
{
    public function testCallFetchAllWithIdMustReturnEndpoint()
    {
        $bling = Bling::client('token', 123123);
        $endpoint = CategoriaLojaRoute::fetchAll();
        self::assertEquals("categoriasLoja/123123", $endpoint);
    }

    public function testCallFetchWithValidParamsMustReturnEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $bling = Bling::client('token', 123123);
        $endpoint = CategoriaLojaRoute::fetch($id);
        self::assertEquals("categoriasLoja/123123/$id", $endpoint);
    }

    public function testCallInsertWithAllParamsMustReturnEndpoint()
    {
        $bling = Bling::client('token', 123123);
        $endpoint = CategoriaLojaRoute::insert();
        self::assertEquals("categoriasLoja/123123", $endpoint);
    }

    public function testCallUpdateWithValidParamsMustReturnEndpoint()
    {
        $bling = Bling::client('token', 123123);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::update($id);
        self::assertEquals("categoriasLoja/123123/$id", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaLojaRoute::delete($id);
    }
}