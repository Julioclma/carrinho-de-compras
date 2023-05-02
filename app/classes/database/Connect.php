<?php

namespace app\classes\database;

use PDO;
use PDOException;

class Connect
{
    private static ?PDO $pdo = null;

    public static function connect()
    {   
       
        try {

            if (!static::$pdo) {
                static::$pdo = new PDO("mysql:host=localhost;dbname=cart", "root", "1234", [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            }

            return static::$pdo;

        } catch (PDOException $e) {

            var_dump($e->getMessage());
            
        }
    }
}
