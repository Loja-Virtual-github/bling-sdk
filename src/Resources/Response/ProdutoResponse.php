<?php

namespace LojaVirtual\Bling\Resources\Response;

use LojaVirtual\Bling\Request\ResponseHandler;

class ProdutoResponse extends AbstractResourceResponse implements ResourceResponseInterface
{
    public function parse(ResponseHandler $response): mixed
    {
        $body = $response->getBody();
        $this->checkForErrors($body);
        $body = $body->retorno;

        if (property_exists($body, 'produtos')) {
            $body = $body->produtos;
        }

        if (is_array($body)) {
            if (is_object(current($body))) {
                $responseParsed = array_map(function($produto) {
                    if (is_object($produto) && property_exists($produto, 'produto')) {
                        return $produto->produto;
                    }
                    exit(var_dump('AQUI'));
                }, $body);
            }
            if (count($responseParsed) === 1) {
                $responseParsed = current($responseParsed);
            }

            return $responseParsed;
        }
    }
}