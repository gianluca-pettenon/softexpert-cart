<?php

namespace App\Model;

use App\Core\Database;

class ProductModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function test()
    {
        return var_dump($this->db->getConnection());
    }

}
