<?php

namespace LojaVirtual\Bling\Tests\unit\Format;

use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Format\FormatFactory;
use LojaVirtual\Bling\Format\FormatInterface;
use LojaVirtual\Bling\Format\XML;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class XMLTest extends BaseTesting
{
    private FormatInterface $format;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->format = FormatFactory::factory('xml');
        parent::__construct($name, $data, $dataName);
    }

    public function testToMustReturnValidJsonString(): void
    {
        $data = ['a' => 'aa', 'b' => array('b' => 'bb')];
        $xml = $this->format->to($data,'custom-root');

        $xmlObject = simplexml_load_string($xml);
        $dataFromXML = json_encode($xmlObject);
        $dataFromXML = json_decode($dataFromXML, true);
        self::assertEquals($data, $dataFromXML);
    }

    public function testFromInvalidXMLFormatedMustThrowsInvalidJsonException(): void
    {
        self::expectException(InvalidXMLException::class);
        $xml = '<?xml version="1.0"?><custom-root/><a>aa</a><b><b>bb</b></b></custom-root>';
        $array = $this->format->from($xml);
    }

    public function testFromValidXMLFormatMustReturnObject(): void
    {
        $xml = '<?xml version="1.0"?><custom-root><a>aa</a><b><b>bb</b></b></custom-root>';
        $object = $this->format->from($xml);
        self::assertIsObject($object);
        self::assertObjectHasAttribute('a', $object);
        self::assertObjectHasAttribute('b', $object);
    }
}