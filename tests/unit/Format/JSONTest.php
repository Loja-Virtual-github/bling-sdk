<?php

namespace LojaVirtual\Bling\Tests\unit\Format;

use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Format\JSON;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class JSONTest extends BaseTesting
{
    public function testToMustReturnValidJsonString(): void
    {
        $data = ['a' => 'aa', 'b' => array('b' => 'bb')];
        $json = JSON::to($data);

        $decoded = json_decode($json, true);
        self::assertEquals($data, $decoded);
    }

    public function testFromInvalidJsonFormatedMustThrowsInvalidJsonException(): void
    {
        self::expectException(InvalidJsonException::class);
        $json = '{["A": "AA"]}';
        $array = JSON::from($json);
    }

    public function testFromValidJsonFormatMustReturnObject(): void
    {
        $json = '{"a":"aa","b":{"b":"bb"}}';
        $object = JSON::from($json);
        self::assertIsObject($object);
        self::assertObjectHasAttribute('a', $object);
        self::assertObjectHasAttribute('b', $object);
    }
}