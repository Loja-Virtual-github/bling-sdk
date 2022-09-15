<?php

namespace LojaVirtual\Bling\Resources;


use LojaVirtual\Bling\Format\JSON;
use LojaVirtual\Bling\Format\XML;
use LojaVirtual\Bling\Request\Request;

abstract class AbstractResource
{
    protected Request $request;

    private array $options = [];

    public function __construct(?array $options = [])
    {
        $this->options = $options;
        $this->request = Request::getInstance();
    }

    protected function getOptions(): array
    {
        return $this->options;
    }

    protected function payloadToXML(array $payload, string $rootNode): string
    {
        return XML::to($payload, $rootNode);
    }

    protected function payloadToJSON(array $payload): string
    {
        return JSON::to($payload);
    }
}