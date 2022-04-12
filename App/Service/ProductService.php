<?php

namespace App\Service;

use App\Repository\ProductRepository;
use App\Helper\Utils;

class ProductService
{

    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository;
    }

    /**
     * @return array - fetched rows
     */

    public function getAll()
    {
        $data = $this->repository->getAll();

        if (!Utils::checkEmptyResult($data)) :
            return ["data" => $data];
        endif;

        return [
            "error" => true,
            "message" => "Nenhum registro encontrado.",
            "class" => "warning"
        ];

    }

}
