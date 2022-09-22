<?php

namespace PabloSanches\Bling\Tests\unit\Routes;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Routes\CategoriaLojaRoute;
use PabloSanches\Bling\Routes\RouteFactory;
use PabloSanches\Bling\Routes\RouteInterface;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class CategoriaLojaRouteTest extends AbstractTestRoute
{
    private RouteInterface $route;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('CategoriaLojaResource', [123]);
        $bling = Bling::client('token', 123123);
        parent::__construct($name, $data, $dataName);
    }

    public function testCallFetchAllWithIdMustReturnEndpoint()
    {
        $endpoint = $this->route->fetchAll();
        self::assertEquals("categoriasLoja/123123", $endpoint);
    }

    public function testCallFetchWithValidParamsMustReturnEndpoint()
    {
        $endpoint = $this->route->fetch();
        self::assertEquals("categoriasLoja/123123/123", $endpoint);
    }

    public function testCallInsertWithAllParamsMustReturnEndpoint()
    {
        $endpoint = $this->route->insert();
        self::assertEquals("categoriasLoja/123123", $endpoint);
    }

    public function testCallUpdateWithValidParamsMustReturnEndpoint()
    {
        $endpoint = $this->route->update();
        self::assertEquals("categoriasLoja/123123/123", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->delete();
    }
}