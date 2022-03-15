<?php

namespace App\Model;

use App\Database\Database;
use App\Interface\InterfaceModel;

class Model implements InterfaceModel
{

    public function __construct()
    {
        $this->connect = Database::connect();
    }

    /**
     * @return int|bool - Last inserted primary key
     */

    public function insert(string $table, array $data): int|bool
    {
        return $this->connect->insertInto($table)->values($data)->execute();
    }

    /**
     * @return array|bool - fetched rows
     */

    public function select(string $table, array $colunms):  array|bool
    {
        return $this->connect->from($this->table)->select($this->colunms)->fetchAll();
    }

    public function update(){}

    public function delete(){}
}
