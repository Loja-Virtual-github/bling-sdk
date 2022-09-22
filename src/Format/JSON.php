<?php

namespace LojaVirtual\Bling\Format;

use LojaVirtual\Bling\Exceptions\InvalidJsonException;

class JSON implements FormatInterface
{
    /**
     * Converte um array em JSON
     *
     * @param array $data
     * @param string|null $root
     * @return string
     */
    public function to(array $data, ?string $root = null): string
    {
        return json_encode($data);
    }

    /**
     * Converte uma string json em objeto
     *
     * @param string $data
     * @return object
     * @throws InvalidJsonException
     */
    public function from(string $data): object
    {
        $data = json_decode($data);

        if (!empty(json_last_error())) {
            throw new InvalidJsonException(json_last_error_msg());
        }

        return $data;
    }
}