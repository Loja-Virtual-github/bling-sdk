<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\SituacaoRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class SituacaoRouteTest extends BaseTesting
{
    public function testCallFetchAllMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = SituacaoRoute::fetchAll();
    }

    public function testCallFetchMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = SituacaoRoute::fetch($id);
        self::assertEquals("/situacao/$id", $endpoint);
    }

    public function testCallInsertMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $endpoint = SituacaoRoute::insert();
    }

    public function testCallUpdateMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = SituacaoRoute::update($id);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = SituacaoRoute::delete($id);
    }
}