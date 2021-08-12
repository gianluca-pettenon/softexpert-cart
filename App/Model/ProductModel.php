<?php

namespace App\Model;

use App\Core\Database;

class ProductModel
{
    public $values = [];
    private $table = 'products';
    private $db;
    private $name;
    private $type;
    private $price;

    public function __construct()
    {
        $this->db = Database::getConnection();
        $this->value = [];
    }

    public function setName($name)
    {
        $this->value['name'] = $name;
    }

    public function setType($type)
    {
        $this->value['type'] = $type;
    }

    public function setPrice($price)
    {
        $this->value['price'] = $price;
    }

    public function create(array $values)
    {
        try {

            $data = $this->db->insertInto($this->table, $values)->execute(); 

            return ['success' => true, 'last_id' => $data];

        } catch (\Throwable $t) {
            return $t->getMessage();
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return false;
    }
}
