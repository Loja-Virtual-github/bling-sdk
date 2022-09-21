<?php

namespace LojaVirtual\Bling\Resources\Response;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Helper;

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