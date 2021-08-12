<?php

namespace App\Model;

use App\Core\Database;

class ProductModel
{
    public $table = 'products';
    public $colunms = ['id', 'name', 'type', 'price'];
    private $values = [];
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

            $result = $this->db->insertInto($this->table, $values)->execute();
            $this->db->close();

            return $result;

        } catch (\Throwable $t) {
            return $t->getMessage();

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return false;
    }

    public function select()
    {
        try {

            $result = $this->db->from($this->table)->select($this->colunms)->orderBy('name')->fetchAll();
            $this->db->close();

            return $result;
            
        } catch (\Throwable $t) {
            return $t->getMessage();

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return false;
    }
}
