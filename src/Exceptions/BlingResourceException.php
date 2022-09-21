<?php

namespace LojaVirtual\Bling\Exceptions;

class BlingResourceException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = $this->parseErrorMessage($message);
        parent::__construct($message, $code, $previous);
    }

    /**
     * Faz o parse das mensages de erro do bling
     *
     * @param string $message
     * @return string
     */
    private function parseErrorMessage(string $message): string
    {
        $error = json_decode($message, true);
        $erros = $error['retorno']['erros'];

        if (is_array(current($erros))) {
            $erros = array_map(function($erro) {
                return sprintf("#%s | %s", $erro['erro']['cod'], $erro['erro']['msg']);
            }, $erros);
        }

        return implode("\r\n", $erros);
    }
}