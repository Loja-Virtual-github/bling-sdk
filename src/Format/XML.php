<?php

namespace LojaVirtual\Bling\Format;

use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use SimpleXMLElement;
use Spatie\ArrayToXml\ArrayToXml;

class XML implements FormatInterface
{
    /**
     * Converte um array em uma string xml
     *
     * @param array $data
     * @param string|null $root
     * @return string
     */
    public static function to(array $data, ?string $root = null): string
    {
        return ArrayToXml::convert($data, $root);
    }

    /**
     * Converte uma string XML em objeto
     *
     * @param string $xml
     * @return object
     * @throws InvalidXmlException
     */
    public static function from(string $xml): object
    {
        try {
            $xml = simplexml_load_string($xml);
            $json = json_encode($xml);
            $data = json_decode($json);
        } catch (\Exception $e) {
            throw new InvalidXmlException($e->getMessage());
        }

        return $data;
    }
}