<?php

namespace LojaVirtual\Bling\Resources;

use LojaVirtual\Bling\Entity\CategoriaEntity;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Routes\CategoriaRoute;

class CategoriaResource extends AbstractResource implements ResourceInterface
{
    public function fetch()
    {
//        $endpoint = CategoriaRoute::fetch();
    }

    public function fetchAll()
    {
//        $endpoint = CategoriaRoute::fetchAll();
    }

    public function insert(array $params)
    {
        try {
            $response = $this->request
                ->sendRequest(
                    Request::POST,
                    CategoriaRoute::insert(),
                    array(
                        'xml' => $this->payloadToXML(['categoria' => $params], 'categorias')
                    )
                );
        } catch (\Exception $e) {
            exit(var_dump($e));
        }

        return $response;
    }

    public function update()
    {
//        $endpoint = CategoriaRoute::update();
    }
}