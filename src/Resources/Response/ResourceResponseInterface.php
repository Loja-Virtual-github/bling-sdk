<?php

namespace PabloSanches\Bling\Resources\Response;

use PabloSanches\Bling\Request\ResponseHandler;

interface ResourceResponseInterface
{
    public function parse(ResponseHandler $response): mixed;
}