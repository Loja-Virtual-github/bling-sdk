<?php
//
//namespace LojaVirtual\Bling\Tests\unit\Resources;
//
//use LojaVirtual\Bling\Bling;
//use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
//use LojaVirtual\Bling\Tests\unit\BaseTesting;
//
//class DepositoTest extends BaseTesting
//{
//    private string $token = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';
//    private int $idLoja = 204159108;
//    private Bling $bling;
//
//    public function __construct(?string $name = null, array $data = [], $dataName = '')
//    {
//        $this->bling = $bling = Bling::client($this->token, $this->idLoja);
//        parent::__construct($name, $data, $dataName);
//    }
//
//    public function getPayload(): array
//    {
//        return json_decode(
//            '
//            {
//                "deposito": {
//                  "situacao": "A",
//                  "descricao": "'. $this->faker->sentence(3) .'"
//                },
//                "depositoPadrao": true,
//                "desconsiderarSaldo": false
//            }' , true);
//    }
//
//    public function testInsertDeposito(): mixed
//    {
//        $payload = $this->getPayload();
//        $deposito = $this
//            ->bling
//            ->deposito()
//            ->insert($payload);
//        self::assertIsObject($deposito);
//        self::assertNotEmpty($deposito);
//        self::assertEquals($payload['deposito']['descricao'], $deposito->descricao);
//
//        return $deposito->id;
//    }
//
//    /**
//     * @depends testInsertDeposito
//     */
//    public function testUpdateDeposito(mixed $idDeposito): void
//    {
//        $payload = $this->getPayload();
//        $payload['deposito']['descricao'] = 'DEPOSITO ALTERADO';
//        $deposito = $this
//            ->bling
//            ->deposito($idDeposito)
//            ->update($payload);
//
//        self::assertIsObject($deposito);
//        self::assertNotEmpty($deposito);
//        self::assertEquals('DEPOSITO ALTERADO', $deposito->descricao);
//    }
//
//    public function testDeleteDepositoMustThrowInvalidEndpointException(): void
//    {
//        self::expectException(InvalidEndpointException::class);
//        $this->bling->deposito()->delete();
//    }
//
//    /**
//     * @depends testInsertDeposito
//     */
//    public function testFetchDeposito(mixed $idDeposito): void
//    {
//        $deposito = $this
//            ->bling
//            ->deposito($idDeposito)
//            ->fetch();
//
//        self::assertIsObject($deposito);
//        self::assertNotEmpty($deposito);
//        self::assertEquals($idDeposito, $deposito->id);
//        self::assertEquals('DEPOSITO ALTERADO', $deposito->descricao);
//    }
//
//    public function testFetchAllDeposito(): void
//    {
//        $depositos = $this
//            ->bling
//            ->deposito
//            ->fetchAll();
//
//        self::assertIsArray($depositos);
//        self::assertNotEmpty($depositos);
//        self::assertIsObject($depositos[0]);
//        self::assertObjectHasAttribute($depositos[0], 'descricao');
//    }
//}