<?php

namespace PabloSanches\Bling\Tests\unit\Routes;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Routes\ProdutoLojaRoute;
use PabloSanches\Bling\Routes\RouteFactory;
use PabloSanches\Bling\Routes\RouteInterface;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class ProdutoLojaRouteTest extends AbstractTestRoute
{
    private RouteInterface $route;
    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('ProdutoLojaResource', [123]);
        $this->bling = Bling::client('token', 123123);
        parent::__construct($name, $data, $dataName);
    }

    public function testCallFetchWithIdMustReturnEndpoint()
    {
        $endpoint = $this->route->fetch();
        self::assertEquals("produto/123", $endpoint);
    }

    public function testCallFetchAllMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->fetchAll();
    }

    public function testCallInsertWithAllParamsMustReturnEndpoint()
    {
        $endpoint = $this->route->insert();
        self::assertEquals("produtoLoja/123123/123", $endpoint);
    }

    public function testCallUpdateWithValidParamsMustReturnEndpoint()
    {
        $endpoint = $this->route->update();
        self::assertEquals("produtoLoja/123123/123", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->delete();
    }
}