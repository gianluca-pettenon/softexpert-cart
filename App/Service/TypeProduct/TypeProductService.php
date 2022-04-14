<?php

namespace App\Service\TypeProduct;

use App\Repository\TypeProduct\TypeProductRepository;
use App\Helper\Utils;

class TypeProductService
{

    private TypeProductRepository $repository;

    public function __construct()
    {
        $this->repository = new TypeProductRepository;
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
