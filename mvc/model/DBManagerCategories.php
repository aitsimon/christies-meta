<?php

class DBManagerCategories
{
    /**
     * @return array of all the categories in the database
     */
    public static function getAll(): array
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM categories";
            $stmt = $dbm->query($clause);
            $results = $stmt->fetchAll();
            $categories = array();
            foreach ($results as $result) {
                $category = new Category($result['cat_id'], $result['name'], $result['description'], $result['img'],$result['upper_cat_id']);
                $categories[] = $category;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $categories;
        }
    }

    /**
     * @param $cat_id integer the id of the category
     * @return false if no category is found or an Object Category.php if it already exists
     */
    public static function getCategoryById($cat_id)
    {
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM categories WHERE cat_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$cat_id]);
            $result = $stmt->fetch();
            if ($stmt->execute([$cat_id])) {
                if($result[4]==null){
                    $result[4]=0;
                }
                $category = new Category((int)$result['cat_id'],$result['name'],$result['description'],$result['img'],$result[4]);
            } else {
                $category = false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $category;
        }
    }

    /**
     * @param $name string Name of the new category
     * @param $description string Description of the new category
     * @param $img string Path to the new image of the new category
     * @return bool true if category has been created successfully of false if it hasn't been created.
     */
    public static function insertCategory($name, $description, $img)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO categories (cat_id ,name, description, img) VALUES (?, ?, ?, ?) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([DBManagerCategories::getNewMaxId(),$name, $description, $img])) {
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
     * @param $cat_id int Id of the modified category
     * @param $name string New name of the category that it's being modified or the new name of the category
     * @param $description string New description of the category
     * @param $img string New path to the new image of the category or the path to the previous one
     * @return bool true if the category has been update successfully or false it hasn't been updated
     */
    public static function updateCategory($cat_id, $name,$description, $img)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "UPDATE categories SET name = ?, description = ?, img = ? WHERE cat_id = ?";
            $stmt = $dbm->prepare($clause);
            if($stmt->execute([$name,$description,$img,$cat_id])) {
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
     * @param $cat_id int Id of the category that it's going to be deleted
     * @return bool true if the category has been deleted, false otherwise
     */
    public static function deleteCategory($cat_id){
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "DELETE FROM categories WHERE cat_id =?";
            $stmt = $dbm->prepare($clause);
            if($stmt->execute([$cat_id])){
                $check = true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $check;
        }
    }
    public static function getAllPossibleCategories(){
        $dbm = Connection::access();
        try {
            $clause = 'SELECT cat_id FROM categories';
            $stmt = $dbm->query($clause);
            $result = $stmt->fetchAll();
            $categories = [];
            foreach ($result as $r){
                $categories[] = $r['cat_id'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $categories;
        }
    }
    public static function getNewMaxId(){
        $dbm = Connection::access();
        try {
            $clause = 'SELECT MAX(cat_id) FROM categories';
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
    public static function getAllNames(){
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM categories';
            $stmt = $dbm->query($clause);
            $result = $stmt->fetchAll();
            $categories = [];
            foreach ($result as $r){
                $categories[] = [$r['cat_id'],$r['name']];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $categories;
        }
    }
    public static function getCatsNameLike($nameEntered){
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM categories where name LIKE concat ('%', ?, '%')";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$nameEntered]);
            $results = $stmt->fetchAll();
            $categories = [];
            foreach ($results as $result){
                $category = new Category($result['cat_id'], $result['name'], $result['description'], $result['img'],$result['upper_cat_id']);
                $categories[] = $category;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $categories;
        }
    }
    public static function getCatsDescriptionLike($description){
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM categories where categories.description LIKE concat ('%', ?, '%')";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$description]);
            $results = $stmt->fetchAll();
            $categories = [];
            foreach ($results as $result){
                $category = new Category($result['cat_id'], $result['name'], $result['description'], $result['img'],$result['upper_cat_id']);
                $categories[] = $category;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $categories;
        }
    }
    public static function getTop10CategoriesOverAllPopularity($order){
        $dbm = Connection::access();
        try {
            $clause = "SELECT categories.cat_id, object.object_id as obj, ifnull(count(purchases.purch_id),0) + (SELECT ifnull(count(object_id),0) from score where object_id=obj) as 'score' from purchases join object on purchases.object_id=object.object_id join categories on object.cat_id=categories.cat_id where purchases.object_id=object.object_id
                GROUP BY categories.cat_id 
                ORDER BY `score` $order limit 10";
            $stmt = $dbm->prepare($clause);
            $stmt->execute([]);
            $results = $stmt->fetchAll();
            $categoriesIds = [];
            foreach ($results as $result){
                $category = [$result['cat_id']];
                $categoriesIds[] = $category;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $categoriesIds;
        }
    }
}