<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\ContatoRoute;
use LojaVirtual\Bling\Routes\RouteFactory;
use LojaVirtual\Bling\Routes\RouteInterface;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ContatoRouteTest extends AbstractTestRoute
{
    private RouteInterface $route;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('ContatoResource', [123]);
        parent::__construct($name, $data, $dataName);
    }

    public function testCallFetchAllMustReturnString()
    {
        $endpoint = $this->route->fetchAll();
        self::assertEquals('contatos', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $endpoint = $this->route->fetch();
        self::assertEquals("contato/123", $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = $this->route->insert();
        self::assertEquals('contato', $endpoint);
    }

    public function testCallUpdateMustReturnString()
    {
        $endpoint = $this->route->update();
        self::assertEquals("contato/123", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->delete();
    }
}