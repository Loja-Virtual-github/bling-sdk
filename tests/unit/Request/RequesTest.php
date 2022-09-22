<?php

namespace LojaVirtual\Bling\Tests\unit\Request;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Request\RequestFactory;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class RequesTest extends BaseTesting
{
    private $request;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->request = RequestFactory::factory();
        parent::__construct($name, $data, $dataName);
    }

    public function testInstanceOf(): void
    {
        self::assertInstanceOf(Request::class, $this->request);
    }
}