<?php

namespace App\Model;

use App\Model\Model;

class ProductModel extends Model
{
    public $table = 'products';
    public $colunms = ['id', 'name', 'type', 'price'];
    public $leftTable;
    private $db;

    public function __construct()
    {
        //$this->db = Database::getConnection();
    }

    public function create(array $values)
    {
        try {

            $result = $this->db->insertInto($this->table, $values)->execute();
            $this->db->close();

            return $result;

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return false;
    }

    public function select()
    {
        try {

            if($this->leftTable !== null) :
                $result = $this->db->from($this->table)->leftJoin($this->leftTable)->select($this->colunms)->fetchAll();
            else:
                $result = $this->db->from($this->table)->select($this->colunms)->orderBy('name')->fetchAll();
            endif;

            $this->db->close();

            return $result;

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return false;
    }
}
