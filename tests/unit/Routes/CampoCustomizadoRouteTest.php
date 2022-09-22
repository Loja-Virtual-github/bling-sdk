<?php

namespace PabloSanches\Bling\Tests\unit\Routes;

use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Routes\RouteFactory;
use PabloSanches\Bling\Routes\RouteInterface;

class CampoCustomizadoRouteTest extends AbstractTestRoute
{
    private RouteInterface $route;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('CampoCustomizadoResource', [123]);
        parent::__construct($name, $data, $dataName);
    }

    public function testFetchAllMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->fetchAll();
    }

    public function testFetchMustReturnString()
    {
        $endpoint = $this->route->fetch();
        self::assertEquals("camposcustomizados/123", $endpoint);
    }

    public function testInsertMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->insert();
    }

    public function testUpdateMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->update();
    }

    public function testDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = $this->route->delete();
    }
}