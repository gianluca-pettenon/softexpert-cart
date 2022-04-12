<?php

namespace App\Service;

use App\Repository\ProductRepository;

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
        return $this->repository->getAll();
    }

}
