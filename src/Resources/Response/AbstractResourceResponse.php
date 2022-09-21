<?php

namespace LojaVirtual\Bling\Resources\Response;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;
use LojaVirtual\Bling\Request\ResponseHandler;

abstract class AbstractResourceResponse
{
    protected function checkForErrors(mixed $body): void
    {
        if (!property_exists($body, 'retorno')) {
            exit('TRATAR AQUI');
        }

        $body = $body->retorno;
        if (property_exists($body, 'erros')) {
            $this->parseErros($body->erros);
        }
    }

    /**
     * Dispara exception com erros tratados
     *
     * @param mixed $erros
     * @return void
     * @throws InvalidResourceException
     */
    private function parseErros(mixed $erros): void
    {

        if (is_array($erros)) {
            $erros = array_map(function($erro){
                return sprintf("#%s | %s", $erro->erro->cod, $erro->erro->msg);
            }, $erros);
        } else {
            $erros = [
                sprintf("#%s | %s", $erros->erro->cod, $erros->erro->msg)
            ];
        }

        if (is_object($erros)) {
            $erros = (array) $erros;
        }

        $errorStr = implode("\r\n", $erros);
        throw new InvalidResourceException($errorStr);
    }
}