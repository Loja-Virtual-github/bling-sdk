<?php

namespace LojaVirtual\Bling\Resources\Response;

use LojaVirtual\Bling\Request\ResponseHandler;

class ProdutoLojaResponse extends AbstractResourceResponse implements ResourceResponseInterface
{
    public function parse(
        ResponseHandler $response,
        ?string $rootProperty = '',
        ?string $objectProperty = ''
    ): mixed {
        $responseParsed = parent::parse($response, 'produtosLoja', 'produtoLoja');

        if (is_object($responseParsed) && property_exists($responseParsed, 'produtos')) {
            $produtoResponse = new ProdutoResponse();
            return $produtoResponse->parse($response, 'produtos', 'produto');
        }

        return $responseParsed;
    }
}