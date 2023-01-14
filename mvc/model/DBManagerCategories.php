<?php
include_once 'Connection.php';
include_once 'model/Category.php';
class DBManagerCategories
{
    public function getAllCategories(){
        $dbm = Connection::access();
        try {
            $clause = "Select * from categories";
            $results = $dbm->query($clause);
            $categories = array();
            foreach ($results as $result) {
                $category = new Category($result['cat_id'],$result['name'],$result['description'],$result['img']);
                $categories[] = $category;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $dbm = null;
            return $categories;
        }
    }
    public function insertCategory($catId, $name, $description, $img){
        $dbm = Connection::access();
        try {
            $check = false;
            $clause = "INSERT INTO categories (cat_id, name, description, img) VALUES ($catId, $name, $description, $img) ";
            $stmt = $dbm->prepare($clause);
            if($stmt->execute([$catId, $name, $description, $img])){
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