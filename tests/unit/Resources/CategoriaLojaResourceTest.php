<?php

namespace LojaVirtual\Bling\Tests\unit\Resources;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

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

//    public function testInsertCategoriaLoja()
//    {
//        $categoriaCriada = $this
//            ->bling
//            ->categoria_loja(204159108)
//            ->insert(array(
//                'idCategoria' => "5793030",
//                'descricaoVinculo' => "LJVT_CAT###0001##5793030",
//                'idVinculoLoja' => "LJVT_CAT_172727_2222",
//            ));
//        self::assertIsNumeric($categoriaCriada->id);
//        self::assertEquals($descricao, $categoriaCriada->descricao);
//
//        return $categoriaCriada->id;
//    }

    public function testUpdateCategoriaLoja()
    {
        $categoriaCriada = $this
            ->bling
            ->categoria_loja(5793030)
            ->update(array(
                'idCategoria' => "5793030",
                'descricaoVinculo' => "LJVT_CAT###0001##5793030",
                'idVinculoLoja' => "LJVT_CAT_172727_2222",
            ));
        self::assertIsNumeric($categoriaCriada->id);
        self::assertEquals('LJVT_CAT###0001##5793030', $categoriaCriada->descricaoVinculo);

        return $categoriaCriada->id;
    }

    public function testDeleteCategoriaLojaMustThrowsInvalidEndpointException()
    {
        self::expectException(InvalidEndpointException::class);
        $categoriaLoja = $this
            ->bling
            ->categoria_loja(5793030)
            ->delete(123);
    }

    public function testFetchCategoriaLoja()
    {
        $idCategoria = 5793030;
        $categoriaLoja = $this
            ->bling
            ->categoria_loja($idCategoria)
            ->fetch();

        self::assertEquals($idCategoria, $categoriaLoja->idCategoria);
    }

    public function testFetchAllCategoriaLoja()
    {
        $categoriasLoja = $this
            ->bling
            ->categoria_loja()
            ->fetchAll();

        self::assertIsArray($categoriasLoja);
        self::assertNotEmpty($categoriasLoja);
    }
}