<?php

namespace LojaVirtual\Bling\Request;

enum HttpMethodsEnum: string
{
    case POST = 'POST';
    case PUT = 'PUT';
    case GET = 'GET';
    case DELETE = 'DELETE';
}
