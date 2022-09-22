<?php

namespace LojaVirtual\Bling\Resources\Response;

use LojaVirtual\Bling\Request\ResponseHandler;

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
