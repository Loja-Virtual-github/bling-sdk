<?php

namespace LojaVirtual\Bling\Resources\Response;

use LojaVirtual\Bling\Request\ResponseHandler;

class ProdutoResponse extends AbstractResourceResponse implements ResourceResponseInterface
{
    public function parse(
        ResponseHandler $response,
        ?string $rootProperty = '',
        ?string $objectProperty = ''
    ): mixed {
        $responseParsed = parent::parse($response, 'produtos', 'produto');

        if ($response->getStatusCode() === 201) {
            $produto = current($responseParsed);
            array_shift($responseParsed);
            $produto->variacoes = $responseParsed;

            return $produto;
        }

        return $responseParsed;
    }
}