<?php

namespace LojaVirtual\Bling\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use LojaVirtual\Bling\Bling;

class RequestFactory
{
    public static function factory(?ClientInterface $httpClient = null): Request
    {
        if (is_null($httpClient)) {
            $httpClient = new Client([
                'base_uri' => Bling::getBaseURI(),
                'timeout' => Bling::getTimeout(),
                'headers' => [
                    'Accept' => 'application/json',
                    'Accept-Encoding' => 'gzip',
                    'User-Agent' => 'Integração LojaVirtual.com.br | Contato: Pablo Sanches <sanches.webmaster@gmail.com>',
                    'RequestId' => uniqid()
                ]
            ]);
        }

        return new Request($httpClient);
    }
}