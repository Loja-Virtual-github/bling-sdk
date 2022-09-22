<?php

namespace LojaVirtual\Bling\Request;

enum HttpMethods: string
{
    case POST = 'POST';
    case PUT = 'PUT';
    case GET = 'GET';
    case DELETE = 'DELETE';
}
