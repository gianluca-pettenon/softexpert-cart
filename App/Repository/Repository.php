<?php

namespace App\Repository;

use App\Database\Database;

class Repository
{

    private $connect;

    public function __construct()
    {
        $this->connect = Database::connect();
    }

    /**
     * @return int|bool - last inserted primary key
     */

    public function insert(string $entity, array $values): int|bool
    {
        return $this->connect->insertInto($entity)->values($values)->execute();
    }

    /**
     * @return array|bool - fetched rows
     */

    public function select(string $entity, array $attributes): array|bool
    {
        return $this->connect->from($entity)->select($attributes)->fetchAll();
    }
}
