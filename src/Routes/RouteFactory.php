<?php

namespace LojaVirtual\Bling\Routes;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Helper;

abstract class RouteFactory
{
    /**
     * Retorna a instância da rota baseada no nome do resource
     *
     * @param string $resourceName
     * @param array $options
     * @return RouteInterface
     * @throws InvalidResourceException
     */
    public static function factory(string $resourceName, array $options = []): RouteInterface
    {
        $routeClassName = Helper::buildRouteClassName($resourceName);
        return new $routeClassName($options);
    }
}