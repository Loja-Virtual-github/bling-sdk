<?php

namespace PabloSanches\Bling\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PabloSanches\Bling\Bling;

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
                    'User-Agent' => 'Integração PabloSanches.com.br | Contato: Pablo Sanches <sanches.webmaster@gmail.com>',
                    'RequestId' => uniqid()
                ]
            ]);
        }

        return new Request($httpClient);
    }
}