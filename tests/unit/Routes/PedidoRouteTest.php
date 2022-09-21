<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\PedidoRoute;
use LojaVirtual\Bling\Routes\RouteFactory;
use LojaVirtual\Bling\Routes\RouteInterface;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class PedidoRouteTest extends BaseTesting
{
    private RouteInterface $route;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('PedidoResource', [123, 123]);
        parent::__construct($name, $data, $dataName);
    }

    public function testCallFetchAllMustReturnString()
    {
        $endpoint = $this->route->fetchAll();
        self::assertEquals('pedidos', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = $this->route->fetch();
        self::assertEquals("pedido/123", $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = $this->route->insert();
        self::assertEquals('pedido', $endpoint);
    }

    public function testCallUpdateMustReturnString()
    {
        $endpoint = $this->route->update();
        self::assertEquals("pedido/123", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->delete();
    }
}