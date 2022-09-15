<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Routes\FormaPagamentoRoute;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class FormaPagamentoRouteTest extends BaseTesting
{
    public function testCallFetchAllMustReturnStringEndpoint()
    {
        $endpoint = FormaPagamentoRoute::fetchAll();
        self::assertEquals('formaspagamento', $endpoint);
    }

    public function testCallFetchMustReturnStringEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = FormaPagamentoRoute::fetch($id);
        self::assertEquals("formapagamento/$id", $endpoint);
    }

    public function testCallInsertMustReturnStringEndpoint()
    {
        $endpoint = FormaPagamentoRoute::insert();
        self::assertEquals('formapagamento', $endpoint);
    }

    public function testCallUpdateMustReturnStringEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = FormaPagamentoRoute::update($id);
        self::assertEquals("formapagamento/$id", $endpoint);
    }

    public function testCallDeleteMustReturnStringEndpoint()
    {
        $id = $this->faker->unique()->randomDigit();
        $endpoint = FormaPagamentoRoute::delete($id);
        self::assertEquals("formapagamento/$id", $endpoint);
    }
}