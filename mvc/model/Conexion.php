<?php

class Conexion
{
    public const DB_CADENA = 'mysql:host=localhost;dbname=christies';
    public const DB_USER = 'root';
    public const DB_PASSWORD = '';
    public static function acceso()
    {
        try {
            $db = new PDO(self::DB_CADENA, self::DB_USER, self::DB_PASSWORD);
            return $db;
        } catch (PDOException $e) {
            echo 'Error en la BD: ' . $e->getMessage();
        }
    }
}
?>