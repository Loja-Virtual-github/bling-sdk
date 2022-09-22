<?php

namespace PabloSanches\Bling\Tests\unit\Routes;

use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Routes\PedidoRoute;
use PabloSanches\Bling\Routes\RouteFactory;
use PabloSanches\Bling\Routes\RouteInterface;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class PedidoRouteTest extends AbstractTestRoute
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