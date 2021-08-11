<?php

namespace App\Core;

use PDO;

class Database
{
    private static $connection;
    private $debug;
    private $hostname;
    private $username;
    private $password;
    private $database;

    public function __construct()
    {
        $this->debug    =  DB_DEBUG;
        $this->hostname =  DB_HOST;
        $this->port     =  DB_PORT;
        $this->username =  DB_USER;
        $this->password =  DB_PASS;
        $this->database =  DB_NAME;
    }

    public function getConnection()
    {
        try {

            if (self::$connection == null) :
                self::$connection = new PDO("pgsql:host={$this->hostname};port={$this->port};dbname={$this->database};", $this->username, $this->password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$connection->setAttribute(PDO::ATTR_PERSISTENT, true);
            endif;

            return self::$connection;
            
        } catch (\PDOException $e) {
            if ($this->debug)
                echo $e->getMessage();

            return null;
        }
    }

    public function disconnect()
    {
        self::$connection = null;
    }
}
