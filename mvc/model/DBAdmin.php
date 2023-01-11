<?php
include "Connection.php";

class DBAdmin
{
    public static function login($email, $password)
    {
        $db = Connection::access();
        try {
            $check = false;
            $stmt = $db->prepare("SELECT * FROM user WHERE email = ? and password = ? and rol='admin'");
            $stmt->execute([$email, $password]);
            $email = $stmt->fetch();
            if ($email) {
                $check = true;
            }
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
            return $check;
        }
    }
}