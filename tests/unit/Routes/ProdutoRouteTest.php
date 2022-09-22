<?php

namespace PabloSanches\Bling\Tests\unit\Routes;

use PabloSanches\Bling\Routes\ProdutoRoute;
use PabloSanches\Bling\Routes\RouteFactory;
use PabloSanches\Bling\Routes\RouteInterface;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class ProdutoRouteTest extends AbstractTestRoute
{
    private RouteInterface $route;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('ProdutoResource', [123]);
        parent::__construct($name, $data, $dataName);
    }

    public function testCallFetchAllMustReturnString()
    {
        $endpoint = $this->route->fetchAll();
        self::assertEquals('produtos', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $endpoint = $this->route->fetch();
        self::assertEquals("produto/123", $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = $this->route->insert();
        self::assertEquals('produto', $endpoint);
    }

    public function testCallUpdateMustReturnString()
    {
        $endpoint = $this->route->update();
        self::assertEquals("produto/123", $endpoint);
    }

    public function testCallDeleteMustReturnString()
    {
        $endpoint = $this->route->delete();
        self::assertEquals("produto/123", $endpoint);
    }
}