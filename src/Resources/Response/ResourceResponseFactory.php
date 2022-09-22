<?php

namespace PabloSanches\Bling\Resources\Response;

use PabloSanches\Bling\Exceptions\InvalidResourceException;
use PabloSanches\Bling\Helper;

abstract class ResourceResponseFactory
{
    /**
     * Retorna a instância de um handler de resposta
     *
     * @param string $resourceName
     * @return ResourceResponseInterface
     * @throws InvalidResourceException
     */
    public static function factory(string $resourceName): ResourceResponseInterface
    {
        $reponseResourceClassName = Helper::buildResponseResourceClassName($resourceName);
        return new $reponseResourceClassName();
    }
}