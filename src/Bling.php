<?php

namespace LojaVirtual\Bling;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;

final class Bling
{
    private const BASE_URI = 'https://bling.com.br/Api/v2/';
    private const TIMEOUT = 1.0;
    private const FORMAT = 'json';
    public static string $token;
    private array $availableResources = [
        'campo_customizado',
        'categoria',
        'categoria_loja',
        'contato',
        'forma_pagamento',
        'nota_fiscal',
        'pedido',
        'produto',
        'produto_loja',
        'situacao'
    ];

    /**
     * Construtor do cliente Bling
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        self::$token = $token;
    }

    /**
     * Retorna uma instância do client Bling
     *
     * @param string $token
     * @return Bling
     */
    public static function client(string $token): Bling
    {
        return new Bling($token);
    }

    /**
     * Retorna a URI básica da API
     *
     * @return string
     */
    public static function getBaseURI(): string
    {
        return self::BASE_URI;
    }

    /**
     * Retorna timeout padrão estimado pela API
     *
     * @return float
     */
    public static function getTimeout(): float
    {
        return self::TIMEOUT;
    }

    /**
     * Retorna formato padrão de retorno do bling
     *
     * @return string
     */
    public static function getFormat(): string
    {
        return self::FORMAT;
    }

    public function __call(string $resourceCalled, array $arguments)
    {
        if (!in_array($resourceCalled, $this->availableResources)) {
            throw new InvalidResourceException("A funcionalidade $resourceCalled não está disponível.");
        }

        $resourceClassName = Helper::buildResourceNamespace($resourceCalled);
        return new $resourceClassName($arguments);
    }
}