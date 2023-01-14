<?php
include_once 'Connection.php';
include_once 'model/Category.php';

class DBManagerCategories
{
    /**
     * @return array of all the categories in the database
     */
    public function getAllCategories()
    {
        $dbm = Connection::access();
        try {
            $clause = "SELECT * FROM categories";
            $results = $dbm->query($clause);
            $categories = array();
            foreach ($results as $result) {
                $category = new Category($result['cat_id'], $result['name'], $result['description'], $result['img']);
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
    public function getCategoryById($cat_id)
    {
        $dbm = Connection::access();
        try {
            $clause = 'SELECT * FROM categories WHERE cat_id = ?';
            $stmt = $dbm->prepare($clause);
            $stmt->execute([$cat_id]);
            $result = $stmt->fetch();
            if ($stmt->execute([$cat_id])) {
                $category = new Category($result['cat_id'], $result['name'], $result['description'], $result['img']);
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
    public function insertCategory($name, $description, $img)
    {
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO categories (name, description, img) VALUES ( ?, ?, ?) ";
            $stmt = $dbm->prepare($clause);
            if ($stmt->execute([$name, $description, $img])) {
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
    public function updateCategory($cat_id, $name,$description, $img)
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
    public function deleteCategory($cat_id){
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
}