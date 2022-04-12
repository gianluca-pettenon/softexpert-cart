<?php

namespace App\Repository;

use App\Database\Database;
use App\Interface\InterfaceRepository;

class Repository implements InterfaceRepository
{

    private $connect;

    public function __construct()
    {
        $this->connect = Database::connect();
    }

    /**
     * @param string $entity
     * @param array $values
     * @return int|bool - last inserted primary key
     */

    public function insert(string $entity, array $values): int|bool
    {
        return $this->connect->insertInto($entity)->values($values)->execute();
    }

    /**
     * @param string $entity
     * @param array $attributes
     * @return array|bool - fetched rows
     */

    public function select(string $entity, array $attributes): array|bool
    {
        return $this->connect->from($entity)->select($attributes)->fetchAll();
    }

    /**
     * @param string $entity
     * @param string $leftJoin
     * @param array $attributes
     * @return array|bool - fetched rows
     */

    public function selectLeftJoin(string $entity, string $leftJoin, array $attributes): array|bool
    {
        return $this->connect->from($entity)->leftJoin($leftJoin)->select($attributes)->fetchAll();
    }
}
