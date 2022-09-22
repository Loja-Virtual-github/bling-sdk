<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\RouteFactory;
use LojaVirtual\Bling\Routes\RouteInterface;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class SituacaoRouteTest extends AbstractTestRoute
{
    private RouteInterface $route;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('SituacaoResource', [123]);
        parent::__construct($name, $data, $dataName);
    }

    public function testCallFetchAll()
    {
        $endpoint = $this->route->fetchAll();
        self::assertEquals('situacao/123', $endpoint);
    }

    public function testCallFetchMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->fetch();
    }

    public function testCallInsertMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->insert();
    }

    public function testCallUpdateMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->update();
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->delete();
    }
}