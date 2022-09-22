<?php

namespace PabloSanches\Bling\Resources\Response;

use PabloSanches\Bling\Request\ResponseHandler;

class SituacaoResponse extends AbstractResourceResponse implements ResourceResponseInterface
{
    public function parse(
        ResponseHandler $response,
        ?string $rootProperty = '',
        ?string $objectProperty = ''
    ): mixed {
        return parent::parse($response, 'situacoes', 'situacao');
    }
}
