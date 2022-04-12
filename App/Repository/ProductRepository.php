<?php

namespace App\Repository;

use App\Repository\Repository;

class ProductRepository extends Repository
{
    public string $allowedEntity = "products";
    public string $leftTable = "";
    protected string $primaryKey = "id";
    protected array $allowedAttribute = ["id", "name", "type", "price"];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->select($this->allowedEntity, $this->allowedAttribute);
    }
}
