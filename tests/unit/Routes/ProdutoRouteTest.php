<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Routes\ProdutoRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ProdutoRouteTest extends BaseTesting
{
    public function testCallFetchAllMustReturnString()
    {
        $endpoint = ProdutoRoute::fetchAll();
        self::assertEquals('produtos', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoRoute::fetch($id);
        self::assertEquals("produto/$id", $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = ProdutoRoute::insert();
        self::assertEquals('produto', $endpoint);
    }

    public function testCallUpdateMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoRoute::update($id);
        self::assertEquals("produto/$id", $endpoint);
    }

    public function testCallDeleteMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ProdutoRoute::delete($id);
        self::assertEquals("produto/$id", $endpoint);
    }
}