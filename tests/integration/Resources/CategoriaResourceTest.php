<?php

namespace LojaVirtual\Bling\Tests\integration\Resources;

use LojaVirtual\Bling\Bling;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Tests\unit\BaseTesting;

class CategoriaResourceTest extends BaseTesting
{
    private string $token = 'c1610a54e2612543827cfa5277636e21b6da6e8ff19ff5a17b64aefafdd8474e382327a8';

    private Bling $bling;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->bling = Bling::client($this->token, 204195687);
        parent::__construct($name, $data, $dataName);
    }

    public function testInsertCategoria()
    {

        $descricao = $this->faker->sentence(3);
        $categoriaCriada = $this
            ->bling
            ->categoria()
            ->insert(array(
                'descricao' => $descricao,
                'idCategoriaPai' => 0
            ));

        self::assertIsNumeric($categoriaCriada->id);
        self::assertEquals($descricao, $categoriaCriada->descricao);

        return $categoriaCriada->id;
    }

    /**
     * @depends testInsertCategoria
     */
    public function testUpdateCategoria($idCategoria)
    {
        $descricaoAlterada = $this->faker->sentence(3);

        $categoriaEditada = $this
            ->bling
            ->categoria($idCategoria)
            ->update(array(
                'descricao' => $descricaoAlterada
            ));

        self::assertIsNumeric($categoriaEditada->id);
        self::assertEquals($descricaoAlterada, $categoriaEditada->descricao);
    }

    /**
     * @depends testInsertCategoria
     */
    public function testDeleteCategoria($idCategoria)
    {
        self::expectException(InvalidEndpointException::class);
        $this->bling->categoria($idCategoria)->delete();
    }

    /**
     * @depends testInsertCategoria
     */
    public function testFetchCategoria($idCategoria)
    {
        $categoria = $this
            ->bling
            ->categoria($idCategoria)
            ->fetch();
        self::assertIsNumeric($categoria->id);
        self::assertEquals($idCategoria, $categoria->id);
    }

    public function testFetchAllCategorias()
    {
        $categorias = $this
            ->bling
            ->categoria()
            ->fetchAll();

        self::assertIsArray($categorias);
        self::assertNotEmpty($categorias);
    }
}