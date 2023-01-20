<?php
include_once 'Connection.php';
include_once 'model/User.php';


class DBManagerUsers
{
    /**
     * @return array of all the users in the database
     */
    public static function getAllUsers()
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM user";
            $results = $dbm->query($clause);
            $users = array();
            foreach ($results as $result) {
                $user = new User($result['user_id'], $result['email'], $result['password'], $result['rol'],$result['tokens'],$result['telph']);
                $users[] = $user;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $users;
        }
    }

    /**
     * @param $user_id integer the id of the user
     * @return boolean False if no user is found or an Object User.php if it already exists
     */
    public static function getUserById($user_id)
    {
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM user WHERE user_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$user_id]);
            $result = $stmt->fetch();
            if ($stmt->execute([$user_id])) {
                $user = new User($result['user_id'], $result['email'], $result['password'], $result['rol'],$result['tokens'],$result['telph']);
            } else {
                $user = false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $user;
        }
    }

    /**
     * @param $email string Email address of the new user
     * @param $password string Password of the new user
     * @param $rol string Role of the new user. Can be one of the following values: 'admin', 'user
     * @param $telph string Telephone number of the new user
     * @return bool True if the new user has been created successfully, false otherwise
     */
    public static function insertUser($email, $password, $rol, $telph)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO user (email, password, rol, telph) VALUES ( ?, ?, ?, ?) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$email, sha1($password), $rol, $telph])) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }

    /**
     * @param $password string New password if it needs to be changed
     * @param $rol string New role if it needs to be changed
     * @param $tokens double New number of tokens if it needs to be changed
     * @param $telph string New telephone number if it needs to be changed
     * @param $user_id integer User ID of the user that is going to be affected by the update
     * @return bool True if the update was successful, false otherwise
     */
    public static function updateUser($password, $rol, $tokens, $telph, $user_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "UPDATE user SET password = ?, rol = ?, tokens = ?, telph = ?  WHERE user_id = ?";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([sha1($password), $rol, $tokens, $telph, $user_id])) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }

    /**
     * @param $user_id int Id of the user to be deleted
     * @return bool true if the user is deleted, false otherwise
     */
    public static function deleteUser(int $user_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "DELETE FROM user WHERE user_id =?";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$user_id])) {
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }



}