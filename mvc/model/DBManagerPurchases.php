<?php
include_once 'Connection.php';
include_once 'model/Purchase.php';

class DBManagerPurchases
{
    /**
     * @return array of all the purchases in the database
     */
    public function getAllPurchases()
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM purchases";
            $results = $dbm->query($clause);
            $purchases = array();
            foreach ($results as $result) {
                $purchase = new Purchase($result['purch_id'],$result['date'],$result['object_id'],$result['user_id']);
                $purchases[] = $purchase;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $purchases;
        }
    }

    /**
     * @param $purch_id integer the id of the purchase
     * @return false if no purchase is found or an Object Virtual_Object.php if it already exists
     */
    public function getPurchaseById($purch_id)
    {
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM purchases WHERE purch_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$purch_id]);
            $result = $stmt->fetch();
            if ($stmt->execute([$purch_id])) {
                $purchase = new Comment($result['com_id'], $result['content'], $result['date'], $result['purch_id'], $result['user_id']);
            } else {
                $purchase = false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $purchase;
        }
    }

    /**
     * @param $object_id integer The ID of the object that it has been bought
     * @param $user_id  integer The ID of the user that has made the transaction
     * @return bool True if the transaction was successfully, false otherwise
     */
    public function insertPurchase($object_id,$user_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO purchases (object_id, user_id) VALUES (?, ?) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$object_id,$user_id])) {
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
     * @param $object_id integer The ID of the object
     * @param $user_id integer The ID of the user
     * @return bool True if the object has been modified successfully, false otherwise
     */
    public function updateObject($object_id,$user_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "UPDATE purchases SET object_id = ?, user_id = ? WHERE purch_id = ?";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$object_id,$user_id])) {
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
     * @param $purch_id int Id of the purchase to be deleted
     * @return bool true if the purchases is deleted, false otherwise
     */
    public function deletePurchase($purch_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "DELETE FROM purchases WHERE purch_id =?";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$purch_id])) {
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