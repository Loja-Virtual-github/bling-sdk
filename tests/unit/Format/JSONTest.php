<?php

namespace LojaVirtual\Bling\Tests\unit\Format;

use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Format\FormatFactory;
use LojaVirtual\Bling\Format\FormatInterface;
use LojaVirtual\Bling\Format\JSON;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class JSONTest extends BaseTesting
{
    private FormatInterface $format;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->format = FormatFactory::factory('json');
        parent::__construct($name, $data, $dataName);
    }

    public function testToMustReturnValidJsonString(): void
    {
        $data = ['a' => 'aa', 'b' => array('b' => 'bb')];
        $json = $this->format->to($data);

        $decoded = json_decode($json, true);
        self::assertEquals($data, $decoded);
    }

    public function testFromInvalidJsonFormatedMustThrowsInvalidJsonException(): void
    {
        self::expectException(InvalidJsonException::class);
        $json = '{["A": "AA"]}';
        $array = $this->format->from($json);
    }

    public function testFromValidJsonFormatMustReturnObject(): void
    {
        $json = '{"a":"aa","b":{"b":"bb"}}';
        $object = $this->format->from($json);
        self::assertIsObject($object);
        self::assertObjectHasAttribute('a', $object);
        self::assertObjectHasAttribute('b', $object);
    }
}