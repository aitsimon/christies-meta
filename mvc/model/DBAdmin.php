<?php
include "Connection.php";

class DBAdmin
{
    public static function login($user, $password)
    {
        $db = Connection::access();
        $check = false;
        $stmt = $db->prepare("SELECT * FROM user WHERE email = ? and password = ?");
        $stmt->execute([$user, $password]);
        $user = $stmt->fetch();
        if ($user) {
            $check = 'true';
            $_SESSION['login'] = true;
            $_SESSION['email'] = (string)$user;
            return $check;
        } else {
            return $check;
        }
    }
}