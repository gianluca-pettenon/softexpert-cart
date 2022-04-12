<?php

namespace App\Repository;

use App\Repository\Repository;

class ProductRepository extends Repository
{
    public string $allowedEntity = "products";
    public string $leftTable = "typeproducts ON typeproducts.id = products.type";
    protected string $foreignKey = "type";
    protected string $primaryKey = "id";
    protected array $allowedAttribute = ["products.id", "products.name", "products.price", "typeproducts.price as tax"];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->selectLeftJoin($this->allowedEntity, $this->leftTable, $this->allowedAttribute);
    }
}
