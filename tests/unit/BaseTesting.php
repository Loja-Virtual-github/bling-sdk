<?php

namespace PabloSanches\Bling\Tests\unit;

use PHPUnit\Framework\TestCase;

class BaseTesting extends TestCase
{
    protected \Faker\Generator $faker;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->faker = \Faker\Factory::create('pt_BR');
        parent::__construct($name, $data, $dataName);
    }
}