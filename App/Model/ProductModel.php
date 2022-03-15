<?php

namespace App\Model;

use App\Model\Model;

class ProductModel extends Model
{
    protected string $table = "products";
    protected string $primaryKey = "id";
    protected array $allowedFields = ["name", "type", "price"];
    protected string $leftTable = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function create(array $values): array|bool
    {
        try {

            $result = parent::insert($this->table, $values);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $result;
    }

    public function select()
    {
        var_dump(parent::select());
        /*try {

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

        return false;*/
    }
}
