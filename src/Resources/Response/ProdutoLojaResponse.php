<?php

namespace PabloSanches\Bling\Resources\Response;

use PabloSanches\Bling\Request\ResponseHandler;

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