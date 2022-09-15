<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\CampoCustomizadoRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class CampoCustomizadoRouteTest extends BaseTesting
{
    public function testFetchAllMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = CampoCustomizadoRoute::fetchAll();
    }

    public function testFetchMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CampoCustomizadoRoute::fetch($id);
        self::assertEquals("camposcustomizados/$id", $endpoint);
    }

    public function testInsertMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = CampoCustomizadoRoute::insert();
    }

    public function testUpdateMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CampoCustomizadoRoute::update($id);
    }

    public function testDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = CampoCustomizadoRoute::delete($id);
    }
}