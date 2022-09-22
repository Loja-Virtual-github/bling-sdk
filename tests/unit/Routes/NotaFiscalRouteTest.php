<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\NotaFiscalRoute;
use LojaVirtual\Bling\Routes\RouteFactory;
use LojaVirtual\Bling\Routes\RouteInterface;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class NotaFiscalRouteTest extends AbstractTestRoute
{
    private RouteInterface $route;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->route = RouteFactory::factory('NotaFiscalResource', [123, 123]);
        parent::__construct($name, $data, $dataName);
    }

    public function testCallFetchAllMustReturnString()
    {
        $endpoint = $this->route->fetchAll();
        self::assertEquals('notasfiscais', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $endpoint = $this->route->fetch();
        self::assertEquals("notafiscal/123/123", $endpoint);
    }

    public function testCallFetchRelatorioMustReturnStringEndpoint()
    {
        $endpoint = $this->route->fetchRelatorios();
        self::assertEquals('relatorios/nfe.xml.php', $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = $this->route->insert();
        self::assertEquals('notafiscal', $endpoint);
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