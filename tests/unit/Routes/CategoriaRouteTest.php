<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\CategoriaRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class CategoriaRouteTest extends BaseTesting
{
    public function testCallFetchAllMustReturnString()
    {
        $endpoint = CategoriaRoute::fetchAll();
        self::assertEquals('categorias', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaRoute::fetch($id);
        self::assertEquals("categoria/$id", $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = CategoriaRoute::insert();
        self::assertEquals('categoria', $endpoint);
    }

    public function testCallUpdateMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaRoute::update($id);
        self::assertEquals("categoria/$id", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CategoriaRoute::delete($id);
    }
}