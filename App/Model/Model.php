<?php

namespace App\Model;

use App\Database\Database;
use App\Interface\InterfaceModel;

class Model implements InterfaceModel
{
    public function __construct(
        private Database $database
    ) {}

    public function insert()
    {
    }

    public function select()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
