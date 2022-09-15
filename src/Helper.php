<?php

namespace LojaVirtual\Bling;

use LojaVirtual\Bling\Exceptions\InvalidResourceException;

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
     * @param $className
     * @return string
     * @throws InvalidResourceException quando o resource construído não foi implementado
     */
    public static function buildResourceNamespace($className): string
    {
        $className = self::toCamel($className);
        $resourceNamespace = sprintf("%s\\Resources\\%sResource", __NAMESPACE__, $className);
        if (!class_exists($resourceNamespace)) {
            throw new InvalidResourceException("A funcionalidade $className não foi encontrada.");
        }

        return $resourceNamespace;
    }
}