<?php

namespace LojaVirtual\Bling;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;

final class Bling
{
    private const BASE_URI = 'https://bling.com.br/Api/v2/';
    private const TIMEOUT = 30;
    private const FORMAT = 'json';

    public static string $token;
    public static ?int $idLoja;
    private array $available_resources = [
        'campo_customizado',
        'categoria',
        'categoria_loja',
        'contato',
        'forma_pagamento',
        'nota_fiscal',
        'pedido',
        'produto',
        'produto_loja',
        'situacao',
        'deposito'
    ];

    /**
     * Construtor do cliente Bling
     *
     * @param string $token
     * @param int|null $idLoja
     */
    public function __construct(string $token, ?int $idLoja = null)
    {
        self::$token = $token;
        self::$idLoja = $idLoja;
    }

    /**
     * Retorna uma instância do client Bling
     *
     * @param string $token
     * @param ?int $idLoja
     * @return Bling
     */
    public static function client(string $token, ?int $idLoja = null): Bling
    {
        return new Bling($token, $idLoja);
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

    /**
     * Retorna a instância de um resource automaticamente
     *
     * @param string $resourceCalled
     * @param array $arguments
     * @return mixed
     * @throws InvalidResourceException
     */
    public function __call(string $resourceCalled, array $arguments)
    {
        if (!in_array($resourceCalled, $this->available_resources)) {
            throw new InvalidResourceException("A funcionalidade $resourceCalled não está disponível.");
        }

        $resourceClassName = Helper::buildResourceNamespace($resourceCalled);
        return new $resourceClassName($arguments);
    }
}