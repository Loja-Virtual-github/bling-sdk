<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\NotaFiscalRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class NotaFiscalRouteTest extends BaseTesting
{
    public function testCallFetchAllMustReturnString()
    {
        $endpoint = NotaFiscalRoute::fetchAll();
        self::assertEquals('notasfiscais', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $numero = $this->faker->unique()->randomDigit();
        $serie = $this->faker->unique()->randomDigit();
        $endpoint = NotaFiscalRoute::fetch($numero, $serie);
        self::assertEquals("notafiscal/$numero/$serie", $endpoint);
    }

    public function testCallFetchRelatorioMustReturnStringEndpoint()
    {
        $endpoint = NotaFiscalRoute::fetchRelatorios();
        self::assertEquals('relatorios/nfe.xml.php', $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = NotaFiscalRoute::insert();
        self::assertEquals('notafiscal', $endpoint);
    }

    public function testCallInsertNumeroSerieMustReturnStringEndpoint()
    {
        $numero = $this->faker->unique()->randomDigit();
        $serie = $this->faker->unique()->randomDigit();
        $endpoint = NotaFiscalRoute::insertNumeroSerie($numero, $serie);
        self::assertEquals("notafiscal/$numero/$serie", $endpoint);
    }

    public function testCallUpdateMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = NotaFiscalRoute::update($id);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = NotaFiscalRoute::delete($id);
    }
}