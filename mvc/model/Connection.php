<?php

class Connection
{
    public const DB_STRING = 'mysql:host=localhost;dbname=christies';
    public const DB_USER = 'root';
    public const DB_PASSWORD = '';

    public static function access()
    {
        try {
            $db = new PDO(self::DB_STRING, self::DB_USER, self::DB_PASSWORD);
            return $db;
        } catch (PDOException $e) {
            echo 'Error en la BD: ' . $e->getMessage();
        }
    }
}

?>