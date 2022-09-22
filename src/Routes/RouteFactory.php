<?php

namespace PabloSanches\Bling\Routes;

use PabloSanches\Bling\Exceptions\InvalidResourceException;
use PabloSanches\Bling\Helper;

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