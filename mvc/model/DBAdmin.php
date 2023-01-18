<?php
include_once "Connection.php";

class DBAdmin
{
    public static function login($email, $password)
    {
        $db = Connection::access();
        try {
            $check = false;
            $stmt = $db->prepare("SELECT * FROM user WHERE email = ? and password = ? and rol='admin'");
            $stmt->execute([$email, sha1($password)]);
            $email = $stmt->fetch();
            if ($email) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
            return $check;
        }
    }

    public static function getColumns($table)
    {
        $db = Connection::access();
        try {
            $clause = "SELECT *FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'" . $table . "' AND TABLE_SCHEMA = 'christies'";
            $result = $db->query($clause);
            $columns = array();
            foreach ($result as $r) {
                $columns[] = $r['COLUMN_NAME'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
            return $columns;
        }
    }

    public static function getPossiblesRoles( $field) {
        try {
            $db = Connection::access();
            $sql = "SHOW FIELDS FROM user LIKE '{$field}'";
            $result = $db->query($sql);
            $row = $result->fetch();
            preg_match('#^enum\((.*?)\)$#ism', $row['Type'], $matches);
            $enum = str_getcsv($matches[1], ",", "'");
            return $enum;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;

        }
    }
    public static function getPossiblesCategories( $field) {
        try {
            $db = Connection::access();
            $sql = "SHOW FIELDS FROM categories LIKE '{$field}'";
            $result = $db->query($sql);
            $row = $result->fetch();
            preg_match('#^enum\((.*?)\)$#ism', $row['Type'], $matches);
            $enum = str_getcsv($matches[1], ",", "'");
            return $enum;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;

        }
    }


}