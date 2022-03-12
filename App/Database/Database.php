<?php

namespace App\Database;

use App\Helper\Utils;

use PDO;

class Database
{

    private $connect = null;

    private function connect()
    {
        try {

            $this->connect = new PDO(
                Utils::getEnv('database.hostname') . ':host=' . Utils::getEnv('database.hostname') . ';dbname=' . Utils::getEnv('database.database'),
                Utils::getEnv('database.username'),
                Utils::getEnv('database.password')
            );

        } catch (\PDOException $e) {

            if (Utils::checkEnableDebug()) {
                echo $e->getMessage();
            }
        }

        return $this->connect;
    }

    protected function getConnect()
    {
        return $this->connect();
    }
}
