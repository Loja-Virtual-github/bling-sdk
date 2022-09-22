<?php

namespace PabloSanches\Bling\Tests\unit;

use PabloSanches\Bling\Exceptions\InvalidResourceException;
use PabloSanches\Bling\Helper;
use PabloSanches\Bling\Resources\CategoriaResource;
use PabloSanches\Bling\Resources\Response\CategoriaResponse;
use PabloSanches\Bling\Routes\CategoriaRoute;

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