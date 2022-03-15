<?php

namespace App\Interface;

interface InterfaceModel
{
    public function insert(string $table, array $data);

    public function select(string $table, array $colunms);

    public function update();

    public function delete();
}
