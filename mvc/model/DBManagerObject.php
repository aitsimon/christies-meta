<?php

class DBManagerObject
{
    /**
     * @return array of all the objects/virtual-objects in the database
     */
    public static function getAll()
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM object";
            $results = $dbm->query($clause);
            $objects = array();
            foreach ($results as $result) {
                $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
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
    public static function getObjectById($object_id)
    {
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM object WHERE object_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([(int)$object_id]);
            $result = $stmt->fetch();
            if ($stmt->execute([$object_id])) {
                $object = new Virtual_Object($result['object_id'], $result['name'], (float) $result['lat'], (float) $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
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
    public static function getObjectsByName($name)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM object where name like concat('%', ?, '%')";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$name]);
            $results = $stmt->fetchAll();
            $objects = array();
            foreach ($results as $result) {
                $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
                $objects[] = $object;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $objects;
        }
    }
    public static function searchByName($name)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM object join categories c on object.cat_id = c.cat_id where object.name like concat('%', ?, '%') OR c.name like concat('%', ?, '%')";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$name,$name]);
            $results = $stmt->fetchAll();
            $objects = array();
            foreach ($results as $result) {
                $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
                $objects[] = $object;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            header('Content-Type: application/json');
            echo json_encode($objects);
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
    public static function insertObject($name, $lat, $lon, $price, $img1, $img2, $img3, $cat_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO object (name, lat, lon, price, img1, img2, img3, cat_id) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$name, $lat, $lon, $price, $img1, $img2, $img3, $cat_id])) {
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
    public static function updateObject($object_id, $name, $lat, $lon, $price, $img1, $img2, $img3, $cat_id)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "UPDATE object SET name = ?, lat = ?, lon = ?, price = ?, img1 = ?, img2 = ?, img3 = ?, cat_id = ? WHERE object_id = ?";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$name, $lat, $lon, $price, $img1, $img2, $img3, $cat_id, $object_id])) {
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
    public static function deleteComment($object_id)
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

    public static function getNewMaxId(){
        $dbm = Connection::access();
        try {
            $clause = 'SELECT MAX(object_id) FROM object';
            $stmt = $dbm->query($clause);
            $result = $stmt->fetch();
            $newId =(int)$result[0]+1;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $newId;
        }
    }
    public static function getAllPurchasedObjectsByUser($user_id)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * from object JOIN purchases on object.object_id=purchases.object_id join user on purchases.user_id=user.user_id where user.user_id=?";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([(int)$user_id]);
            $results = $stmt->fetchAll();
            $objects = false;
            if ($stmt->execute([$user_id])) {
                $objects = array();
                foreach ($results as $result) {
                    $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
                    $objects[]=$object;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $objects;
        }
    }
    public static function getAllObjectsFromCategory($cat_id)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * from object where cat_id = ?";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([(int)$cat_id]);
            $results = $stmt->fetchAll();
            $objects = false;
            if ($stmt->execute([$cat_id])) {
                $objects = array();
                foreach ($results as $result) {
                    $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
                    $objects[]=$object;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $objects;
        }
    }
    public static function getObjectsByLikes($order)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * from object join score on object.object_id = score.object_id order by score.score_points $order ";
            $stmt = $dbm->prepare($clause);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $objects = false;
            if ($stmt->execute()) {
                $objects = array();
                foreach ($results as $result) {
                    $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
                    $objects[]=$object;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $objects;
        }
    }
    public static function getObjectsByPurchases($order)
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * from object join purchases p on object.object_id = p.object_id order by count(object.object_id) $order";
            $stmt = $dbm->prepare($clause);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $objects = false;
            if ($stmt->execute()) {
                $objects = array();
                foreach ($results as $result) {
                    $object = new Virtual_Object($result['object_id'], $result['name'], $result['lat'], $result['lon'], $result['price'], $result['img1'], $result['img2'], $result['img3'], $result['cat_id']);
                    $objects[]=$object;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $objects;
        }
    }

}