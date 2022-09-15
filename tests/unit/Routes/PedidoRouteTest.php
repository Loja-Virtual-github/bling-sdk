<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\PedidoRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class PedidoRouteTest extends BaseTesting
{
    public function testCallFetchAllMustReturnString()
    {
        $endpoint = PedidoRoute::fetchAll();
        self::assertEquals('pedidos', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = PedidoRoute::fetch($id);
        self::assertEquals("pedido/$id", $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = PedidoRoute::insert();
        self::assertEquals('pedido', $endpoint);
    }

    public function testCallUpdateMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = PedidoRoute::update($id);
        self::assertEquals("pedido/$id", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = PedidoRoute::delete($id);
    }
}