<?php

namespace App\Database;

use App\Helper\Utils;

use PDO;

class Database
{

    public static function connect()
    {
        try {

            $pdo = new PDO(
                Utils::getEnv('database.driver') . ':host=' . Utils::getEnv('database.hostname') . ';dbname=' . Utils::getEnv('database.database'),
                Utils::getEnv('database.username'),
                Utils::getEnv('database.password')
            );

            $connect = new \Envms\FluentPDO\Query($pdo);

        } catch (\PDOException $e) {

            if (Utils::checkEnableDebug()) {
                echo $e->getMessage();
            }
        }

        return $connect;
    }
}
