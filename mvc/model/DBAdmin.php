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

    public function getColumns($table)
    {
        $db = Connection::access();
        try {
            $clause ="SELECT *FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$table."' AND TABLE_SCHEMA = 'christies'";
            $result = $db->query($clause);
            $columns = array();
            foreach ($result as $r){
              $columns[] = $r['COLUMN_NAME'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
            return $columns;
        }
    }
}