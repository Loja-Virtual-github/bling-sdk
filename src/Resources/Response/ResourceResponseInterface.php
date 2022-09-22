<?php

namespace LojaVirtual\Bling\Resources\Response;

use LojaVirtual\Bling\Request\ResponseHandler;

interface ResourceResponseInterface
{
    public function parse(ResponseHandler $response): mixed;
}