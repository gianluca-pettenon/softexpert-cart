<?php

namespace App\Repository\TypeProduct;

use App\Repository\Repository;

class TypeProductRepository extends Repository
{
    public string $allowedEntity = "typeproducts";
    protected string $primaryKey = "id";
    protected array $allowedAttribute = ["id", "name", "price"];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->select($this->allowedEntity, $this->allowedAttribute);
    }
}
