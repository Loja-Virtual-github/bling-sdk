<?php

namespace PabloSanches\Bling\Resources\Response;

use PabloSanches\Bling\Exceptions\InvalidResourceException;
use PabloSanches\Bling\Request\ResponseHandler;

abstract class AbstractResourceResponse
{
    public function parse(
        ResponseHandler $response,
        ?string $rootProperty = '',
        ?string $objectProperty = ''
    ): mixed {
        $body = $response->getBody();
        $this->checkForErrors($body);
        $body = $body->retorno;
        $responseParsed = [];

        if (property_exists($body, $rootProperty)) {
            $body = $body->{$rootProperty};
        }

        if (is_object($body) && property_exists($body, $objectProperty)) {
            return $body->{$objectProperty};
        }

        if (is_array($body)) {
            foreach ($body as $item) {
                if (is_array($item) && count($item) === 1 && is_object(current($item))) {
                    $object = current($item);
                    if (property_exists($object, $objectProperty)) {
                        $responseParsed[] = $object->{$objectProperty};
                    } else {
                        $responseParsed[] = $object;
                    }
                }

                if (is_object($item) && property_exists($item, $objectProperty)) {
                    $responseParsed[] = $item->{$objectProperty};
                }
            }
        }

        if (count($responseParsed) === 1) {
            return current($responseParsed);
        }

        if (empty($responseParsed)) {
            return $body;
        }

        return $responseParsed;
    }

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
            if (property_exists($erros, 'erro')) {
                $erros = [
                    sprintf("#%s | %s", $erros->erro->cod, $erros->erro->msg)
                ];
            }
        }

        if (is_object($erros)) {
            $erros = (array) $erros;
        }

        $errorStr = implode("\r\n", $erros);
        throw new InvalidResourceException($errorStr);
    }
}