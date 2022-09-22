<?php

namespace PabloSanches\Bling\Tests\unit\Request;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Request\Request;
use PabloSanches\Bling\Request\RequestFactory;
use PabloSanches\Bling\Tests\unit\BaseTesting;

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