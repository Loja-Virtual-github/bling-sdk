<?php

namespace PabloSanches\Bling\Format;

use PabloSanches\Bling\Exceptions\InvalidResponseFormatException;

class FormatFactory
{
    /**
     * Retorna o formatador baseado no content-type da resposta
     *
     * @param string $type
     * @return FormatInterface
     * @throws InvalidResponseFormatException
     */
    public static function factory(string $type): FormatInterface
    {
        $formatClassName = self::getFormatClassName($type);
        return new $formatClassName();
    }

    /**
     * Retorna o nome do formatador pelo content-type
     *
     * @param string $formatName
     * @return string
     * @throws InvalidResponseFormatException
     */
    private static function getFormatClassName(string $formatName): string
    {
        $formatName = mb_strtoupper($formatName);
        $formatClassName = __NAMESPACE__ . "\\" . $formatName;
        if (!class_exists($formatClassName)) {
            throw new InvalidResponseFormatException("Formato de resposta inválido.");
        }

        return $formatClassName;
    }
}
