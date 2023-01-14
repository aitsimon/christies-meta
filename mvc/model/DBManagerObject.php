<?php
include_once 'Connection.php';
include_once 'model/Virtual_Object.php';

class DBManagerObject
{
    /**
     * @return array of all the objects/virtual-objects in the database
     */
    public function getAllComments()
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM object";
            $results = $dbm->query($clause);
            $objects = array();
            foreach ($results as $result) {
                $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3']);
                $objects[] = $object;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $objects;
        }
    }

    /**
     * @param $object_id integer the id of the object
     * @return false if no object is found or an Object Virtual_Object.php if it already exists
     */
    public function getObjectById($object_id)
    {
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM object WHERE object_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$object_id]);
            $result = $stmt->fetch();
            if ($stmt->execute([$object_id])) {
                $object = new Comment($result['com_id'], $result['content'], $result['date'], $result['object_id'], $result['user_id']);
            } else {
                $object = false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $object;
        }
    }

    /**
     * @param $name string Name of the new virtual object
     * @param $lat double Latitude coordinate of the new virtual object if its needed
     * @param $lon double Longitude coordinate of the new virtual object if its needed
     * @param $price double Price of the new virtual object
     * @param $img1 string Path to the image of the new virtual object, this one is mandatory
     * @param $img2 string Path to another image of the new virtual object, this one is optional. Enter NULL if it's not required
     * @param $img3 string Path to another image of the new virtual object, this one is optional. Enter NULL if it's not required
     * @return bool True if the new virtual object has been created successfully, false otherwise
     */
    public function insertObject($name, $lat, $lon, $price, $img1, $img2, $img3)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO object (name, lat, lon, price, img1, img2, img3) VALUES ( ?, ?, ?, ?, ?, ?, ?) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$name, $lat, $lon, $price, $img1, $img2, $img3])) {
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
     * @param $object_id int Id of the object it's going to be modified
     * @param $name string Name of the object or the new name if this field is going to be modified
     * @param $lat double Latitude of the object or the new latitude if this field is going to be modified
     * @param $lon double Longitude of the object or the new longitude if this field is going to be modified
     * @param $price double Price of the object or the new price if this field is going to be modified
     * @param $img1 string Path to the image of the object or the new image if this field is going to be modified
     * @param $img2 string Path to the image of the object or the new image if this field is going to be modified
     * @param $img3 string Path to the image of the object or the new image if this field is going to be modified
     * @return bool True if the virtual object has been modified successfully, false otherwise
     */
    public function updateObject($object_id, $name, $lat, $lon, $price, $img1, $img2, $img3)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "UPDATE object SET name = ?, lat = ?, lon = ?, price = ?, img1 = ?, img2 = ?, img3 = ? WHERE object_id = ?";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$name, $lat, $lon, $price, $img1, $img2, $img3, $object_id])) {
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
     * @param $object_id int Id of the object to be deleted
     * @return bool true if the object is deleted, false otherwise
     */
    public function deleteComment($object_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "DELETE FROM object WHERE object_id =?";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$object_id])) {
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