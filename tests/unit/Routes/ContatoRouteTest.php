<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Routes\ContatoRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class ContatoRouteTest extends BaseTesting
{
    public function testCallFetchAllMustReturnString()
    {
        $endpoint = ContatoRoute::fetchAll();
        self::assertEquals('/contatos', $endpoint);
    }

    public function testCallFetchMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ContatoRoute::fetch($id);
        self::assertEquals("/contato/$id", $endpoint);
    }

    public function testCallInsertMustReturnString()
    {
        $endpoint = ContatoRoute::insert();
        self::assertEquals('/contato', $endpoint);
    }

    public function testCallUpdateMustReturnString()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ContatoRoute::update($id);
        self::assertEquals("/contato/$id", $endpoint);
    }

    public function testCallDeleteMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $id = $this->faker->unique()->randomDigit();
        $endpoint = ContatoRoute::delete($id);
    }
}