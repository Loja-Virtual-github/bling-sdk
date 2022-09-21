<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\CategoriaLojaRoute;
use LojaVirtual\Bling\Routes\RouteFactory;
use LojaVirtual\Bling\Routes\RouteInterface;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class CategoriaLojaRouteTest extends BaseTesting
{
    private RouteInterface $route;
    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('CategoriaLojaResource', [123]);
        $this->bling = Bling::client('token', 123123);
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