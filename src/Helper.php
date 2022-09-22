<?php

namespace PabloSanches\Bling;

use PabloSanches\Bling\Exceptions\InvalidResourceException;

abstract class Helper
{
    /**
     * Converte uma string para o padrão CamelCase
     *
     * @param string $str
     * @return string
     */
    public static function toCamel(string $str): string
    {
        $str = mb_strtolower($str);
        $strPartsUnderline = explode('_', $str);
        $strPartsUnderline = array_map('ucfirst', $strPartsUnderline);
        $str = implode('', $strPartsUnderline);

        $strPartsDash = explode('-', $str);
        $strPartsDash = array_map('ucfirst', $strPartsDash);
        $str = implode('', $strPartsDash);

        $strPartsSpace = explode(' ', $str);
        $strPartsSpace = array_map('ucfirst', $strPartsSpace);
        return implode('', $strPartsSpace);
    }

    /**
     * Constrói o namespace de resource da classe enviada
     *
     * @param string $className
     * @return string
     * @throws InvalidResourceException quando o resource construído não foi implementado
     */
    public static function buildResourceNamespace(string $className): string
    {
        $className = self::toCamel($className);
        $resourceNamespace = sprintf("%s\\Resources\\%sResource", __NAMESPACE__, $className);
        if (!class_exists($resourceNamespace)) {
            throw new InvalidResourceException("A funcionalidade $className não foi encontrada.");
        }

        return $resourceNamespace;
    }

    /**
     * Retorna o namespace da rota de um resource
     *
     * @param string $resourceName
     * @return string
     * @throws InvalidResourceException
     */
    public static function buildRouteClassName(string $resourceName): string
    {
        $resourceNameParts = explode('\\', $resourceName);
        $resourceName = end($resourceNameParts);
        $resourceName = strtr($resourceName, array(
            'Resource' => 'Route'
        ));

        $routeClassName = sprintf(
            "%s\\Routes\\%s",
            __NAMESPACE__,
            $resourceName
        );

        if (!class_exists($routeClassName)) {
            throw new InvalidResourceException("Rota $resourceName não foi implementado.");
        }

        return $routeClassName;
    }

    /**
     * Retorna o namespace do handler de resposta de um resource
     *
     * @param string $resourceName
     * @return string
     * @throws InvalidResourceException
     */
    public static function buildResponseResourceClassName(string $resourceName): string
    {
        $resourceNameParts = explode('\\', $resourceName);
        $resourceName = end($resourceNameParts);
        $resourceName = strtr($resourceName, array(
            'Resource' => 'Response'
        ));

        $responseResourceName = sprintf(
            "%s\\Resources\\Response\\%s",
            __NAMESPACE__,
            $resourceName
        );

        if (!class_exists($responseResourceName)) {
            throw new InvalidResourceException("Handler de resposta do resource $resourceName não foi implementado.");
        }

        return $responseResourceName;
    }
}