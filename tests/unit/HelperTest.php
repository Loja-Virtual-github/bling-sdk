<?php

namespace LojaVirtual\Bling\Tests\unit;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Helper;
use LojaVirtual\Bling\Resources\CategoriaResource;

class HelperTest extends BaseTesting
{
    public function testToCamel(): void
    {
        $string = 'STRING-to_Camelize now';
        $camilized = Helper::toCamel($string);
        self::assertEquals('StringToCamelizeNow', $camilized);
    }

    public function testBuildResourceNamespaceForNonExistanceResourceMustThrowsInvalidResourceException(): void
    {
        self::expectException(InvalidResourceException::class);
        $resource = Helper::buildResourceNamespace('nonExist');
    }

    public function testBuildResourceNamespaceForExistMustReturnNamespace()
    {
        $resource = Helper::buildResourceNamespace('categoria');
        self::assertEquals(CategoriaResource::class, $resource);
    }
}