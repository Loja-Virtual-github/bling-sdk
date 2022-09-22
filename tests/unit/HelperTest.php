<?php

namespace LojaVirtual\Bling\Tests\unit;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Helper;
use LojaVirtual\Bling\Resources\CategoriaResource;
use LojaVirtual\Bling\Resources\Response\CategoriaResponse;
use LojaVirtual\Bling\Routes\CategoriaRoute;

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

    public function testBuildRouteClassName(): void
    {
        $routeClassName = Helper::buildRouteClassName('CategoriaResource');
        self::assertEquals(CategoriaRoute::class, $routeClassName);
    }

    public function testBuildResponseResourceClassName(): void
    {
        $routeClassName = Helper::buildResponseResourceClassName('CategoriaResource');
        self::assertEquals(CategoriaResponse::class, $routeClassName);
    }
}