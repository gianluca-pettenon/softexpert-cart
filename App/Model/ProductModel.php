<?php

namespace App\Model;

use App\Core\Database;

class ProductModel
{

    private $db;
    private $name;
    private $description;
    private $price;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getAll()
    {
        $query = "SELECT products.id, products.name, products.description, products.price FROM products ORDER BY products.name";
    }

}
