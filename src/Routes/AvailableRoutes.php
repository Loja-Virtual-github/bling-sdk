<?php

namespace LojaVirtual\Bling\Routes;

enum AvailableRoutes: string
{
    case FETCH = 'fetch';
    case FETCH_ALL = 'fetchAll';
    case INSERT = 'insert';
    case UPDATE = 'update';
    case DELETE = 'delete';
}
