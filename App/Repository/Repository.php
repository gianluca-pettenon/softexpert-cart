<?php

namespace App\Repository;

use App\Database\Database;

class Repository
{

    private Database $connect;

    public function __construct()
    {
        $this->connect = Database::connect();
    }

    /**
     * @return int|bool - last inserted primary key
     */

    public function insert(string $table, array $data): int|bool
    {
        return $this->connect->insertInto($table)->values($data)->execute();
    }

    /**
     * @return array|bool - fetched rows
     */

    public function select(string $table, array $colunms): array|bool
    {
        return $this->connect->from($table)->select($colunms)->fetchAll();
    }
}
