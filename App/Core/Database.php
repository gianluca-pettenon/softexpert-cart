<?php

namespace App\Core;

use PDO;

class Database
{
    private static $connection;
    private static $debug = DB_DEBUG;
    private static $hostname = DB_HOST;
    private static $username = DB_USER;
    private static $password = DB_PASS;
    private static $database = DB_NAME;

    public static function getConnection()
    {
        try {

            if (self::$connection == null) :
                $pdo = new PDO('pgsql:host=' . self::$hostname . ';dbname=' . self::$database, self::$username, self::$password);
                self::$connection = new \Envms\FluentPDO\Query($pdo);
            endif;

            return self::$connection;
            
        } catch (\PDOException $e) {
            if (self::$debug)
                echo $e->getMessage();

            return null;
        }
    }

    public function disconnect()
    {
        self::$connection = null;
    }
}
