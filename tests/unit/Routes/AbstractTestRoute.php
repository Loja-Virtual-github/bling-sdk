<?php

namespace PabloSanches\Bling\Tests\unit\Routes;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class AbstractTestRoute extends BaseTesting
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        $bling = Bling::client('token', 123123);
    }
}