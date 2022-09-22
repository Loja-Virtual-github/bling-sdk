<?php

namespace LojaVirtual\Bling\Tests\unit\Routes;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class AbstractTestRoute extends BaseTesting
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        $bling = Bling::client('token', 123123);
    }
}