<?php

namespace PabloSanches\Bling\Format;

use PabloSanches\Bling\Exceptions\InvalidXmlException;
use Spatie\ArrayToXml\ArrayToXml;
use Exception;

class XML implements FormatInterface
{

    /**
     * Converte um array em uma string xml
     *
     * @param array $data
     * @param string|null $root
     * @return string
     */
    public function to(array $data, ?string $root = null): string
    {
        return ArrayToXml::convert($data, $root);
    }

    /**
     * Converte uma string XML em objeto
     *
     * @param string $data
     * @return object
     * @throws InvalidXmlException
     */
    public function from(string $data): object
    {
        try {
            $xml = simplexml_load_string($data);
            $json = json_encode($xml);
            $data = json_decode($json);
        } catch (Exception $e) {
            throw new InvalidXmlException($e->getMessage());
        }

        return $data;
    }
}
