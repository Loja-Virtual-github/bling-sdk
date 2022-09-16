<?php

namespace LojaVirtual\Bling\Resources;

use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Routes\CampoCustomizadoRoute;

class CampoCustomizadoResource extends AbstractResource implements ResourceInterface
{
    public const PRODUTOS = 'Produtos';
    public const CONTATOS = 'Contatos';

    public function fetch(string $modulo): object
    {
        $response = $this->request
            ->sendRequest(
                Request::GET,
                CampoCustomizadoRoute::fetch($modulo)
            );

        $responseParsed = $this->parseResponse($response);
        return $responseParsed->camposcustomizados[0][0];
    }

    public function fetchAll(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    public function insert(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    public function update(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }

    public function delete(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}