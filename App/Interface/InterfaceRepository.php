<?php

namespace App\Interface;

interface InterfaceRepository
{
    public function insert(string $entity, array $values);

    public function select(string $entity, array $attributes);

    public function selectLeftJoin(string $entity, string $leftJoin, array $attributes);
}
