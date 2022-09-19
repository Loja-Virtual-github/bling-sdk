<?php

namespace LojaVirtual\Bling\Tests\unit\Request;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class RequesTest extends BaseTesting
{
    public function testGetInstanceAlwaysMustReturnAnSingleInstance()
    {
        $request = Request::getInstance();
        $request2 = Request::getInstance();
        self::assertEquals($request, $request2);
    }

    private function formParamsTypesProvider()
    {
        return [
            [Request::POST],
            [Request::PUT]
        ];
    }

    /**
     * @dataProvider formParamsTypesProvider
     */
    public function testPrepareFormParamsPayload(string $method)
    {
        $bling = new Bling('teste');
        $payload = array('xml' => '<teste/>');
        $payloadPrepared = Request::preparePayload($method, $payload);
        $payloadExpected = array(
            'form_params' => array(
                'xml' => '<teste/>',
                'apikey' => 'teste'
            ),
            'debug' => false
        );

        self::assertEquals($payloadExpected, $payloadPrepared);
    }
}