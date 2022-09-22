<?php

namespace PabloSanches\Bling\Tests\unit\Resources;

use PabloSanches\Bling\Bling;
use PabloSanches\Bling\Exceptions\InvalidEndpointException;
use PabloSanches\Bling\Tests\unit\BaseTesting;

class CategoriaLojaResourceTest extends BaseTesting
{
    private string $token = '18cf793d1362cbe406b88e595e0067c676c12b4c720bccb69d7d25079b07c18bcf0d7260';
    private int $idLoja = 204159108;

    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bling = $bling = Bling::client($this->token, $this->idLoja);
        parent::__construct($name, $data, $dataName);
    }

    public function testInsertCategoriaLoja(): mixed
    {
        $categoriaCriada = $this
            ->bling
            ->categoria_loja(204159108)
            ->insert(array(
                'idCategoria' => "5827317",
                'descricaoVinculo' => "LJVT_CAT###0001##5827317",
                'idVinculoLoja' => "LJVT_CAT_172727_2222",
            ));
        self::assertIsNumeric($categoriaCriada->id);
        self::assertEquals('LJVT_CAT###0001##5827317', $categoriaCriada->descricaoVinculo);

        return $categoriaCriada->id;
    }

    /**
     * @depends testInsertCategoriaLoja
     */
    public function testUpdateCategoriaLoja(mixed $idVinculoCategoria): void
    {
        $categoriaCriada = $this
            ->bling
            ->categoria_loja(5827317, $idVinculoCategoria)
            ->update(array(
                'idCategoria' => "5827317",
                'descricaoVinculo' => "LJVT_CAT###0001##5827317 - ALTERADO",
                'idVinculoLoja' => "LJVT_CAT_172727_2222",
            ));
        self::assertIsNumeric($categoriaCriada->id);
        self::assertEquals('LJVT_CAT###0001##5827317 - ALTERADO', $categoriaCriada->descricaoVinculo);
    }

    /**
     * @depends testInsertCategoriaLoja
     */
    public function testDeleteCategoriaLojaMustThrowsInvalidEndpointException(mixed $idCategoriaVinculo)
    {
        self::expectException(InvalidEndpointException::class);
        $categoriaLoja = $this
            ->bling
            ->categoria_loja($idCategoriaVinculo)
            ->delete();
    }

    /**
     * @depends testInsertCategoriaLoja
     */
    public function testFetchCategoriaLoja(mixed $idVinculoCategoria): void
    {
        $categoriaLoja = $this
            ->bling
            ->categoria_loja(5827317, $idVinculoCategoria)
            ->fetch();

        self::assertEquals($idVinculoCategoria, $categoriaLoja->id);
    }

    public function testFetchAllCategoriaLoja(): void
    {
        $categoriasLoja = $this
            ->bling
            ->categoria_loja()
            ->fetchAll();

        self::assertIsArray($categoriasLoja);
        self::assertNotEmpty($categoriasLoja);
    }
}