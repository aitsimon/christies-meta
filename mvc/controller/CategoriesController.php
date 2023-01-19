<?php

class CategoriesController
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function viewCategory($category_id){
        require ('model/session-control.php');
        $category = DBManagerCategories::getCategoryById($category_id);
        $info['category']=$category;
        $info['possibleCategories']=DBManagerCategories::getAllPossibleCategories();
        $info['title'] = $category->getName();
        $this->load_view('view/back-card-views/card-categories.php','view/template.php',$info);
    }
    public function addCategory(){
        require ('model/session-control.php');
        $info = array();
        $info['title'] = 'New category';
        $this->load_view('view/back-card-views/card-categories-add.php','view/template.php',$info);
    }
    public function processCategory($action){
        require ('model/session-control.php');
        if(isset($_POST['delete'])){
            $check = DBManagerCategories::deleteCategory($_POST['categoryId']);
            if($check){
                header('Location: ../categories');
            }else{
                $_SESSION['error-message'] = 'Category could not be deleted';
            }
        }else if(isset($_POST['add'])){
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;
            $categoryName = $_POST['categoryName'];
            $categoryDescription = $_POST['categoryDescription'];
           $_POST['categoryId'] =(string) DBManagerCategories::getNewMaxId();

            $mega = 1024 * 1024;
            $tam = $_FILES["categoryImg"]["size"];


            if($categoryName===''){
                $errorMsg.= 'Name field is empty';
                $check = false;
            }else{
                $regex = '/^[a-záéíóúüñç_]{2,20}$/i';
                if(!preg_match($regex,$categoryName)){
                    $errorMsg.= 'Name field invalid.Name field invalid. No numbers or special characters allowed. Min length: 2. Max length: 20. ';
                    $check = false;
                }
            }
            if(strlen($categoryDescription)>=1000){
                $errorMsg.= 'Description max length 1000.';
                $check = false;
            }
            if ($tam > 8 * $mega) { //1024 bytes = 1KB =>1024*1024=1MB
                $errorMsg = "Archivo muy grande";
                $check =false;
            } else {
                $temporal = $_FILES["categoryImg"]["tmp_name"];
                $fileName = 'main';
                $extension = pathinfo( $_FILES["categoryImg"]["name"], PATHINFO_EXTENSION );
                $newName = $fileName . "." . $extension;
                mkdir($_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['categoryId']."/{$newName}", 0777, true);
                $path = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['categoryId']."/{$newName}";
                $absolutePath= __DIR__ .'/'.$path;
                if(!file_exists($absolutePath)){
                    move_uploaded_file($temporal, $path);
                    $categoryImg="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['categoryId']."/{$newName}";
                }else{
                    $errorMsg.= "Archivo no enviado, ya existe";
                    $categoryImg =$_POST['categoryImg'];
                }
            }
            $check2=false;
            if($check){
               $check2= DBManagerCategories::insertCategory($categoryName,$categoryDescription,$categoryImg);

            }else{
                $_SESSION['error-message'] = $errorMsg;
            }
            if(!$check2){
                $this->addCategory();
            }else{
                header("Location: ../categories");
            }
        }else{
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;
            $catId =(int)$_POST['categoryId'];
            $categoryName = $_POST['categoryName'];
            $categoryDescription = $_POST['categoryDescription'];


            $mega = 1024 * 1024;
            $tam = $_FILES["categoryImg"]["size"];


            if($categoryName===''){
                $errorMsg.= 'Name field is empty';
                $check = false;
            }else{
                $regex = '/^[a-záéíóúüñç_]{2,20}$/i';
                if(!preg_match($regex,$categoryName)){
                    $errorMsg.= 'Name field invalid.Name field invalid. No numbers or special characters allowed. Min length: 2. Max length: 20. ';
                    $check = false;
                }
            }
            if(strlen($categoryDescription)>=1000){
                $errorMsg.= 'Description max length 1000.';
                $check = false;
            }
            if ($tam > 8 * $mega) { //1024 bytes = 1KB =>1024*1024=1MB
                $errorMsg = "Archivo muy grande";
                $check =false;
            } else {
                $temporal = $_FILES["categoryImg"]["tmp_name"];
                $fileName = 'main';
                $extension = pathinfo( $_FILES["categoryImg"]["name"], PATHINFO_EXTENSION );
                $newName = $fileName . "." . $extension;
                $path = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['categoryId']."/{$newName}";
                $absolutePath= __DIR__ .'/'.$path;
                if(!file_exists($absolutePath)){
                    move_uploaded_file($temporal, $path);
                    $categoryImg="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['categoryId']."/{$newName}";
                }else{
                    $errorMsg.= "Archivo no enviado, ya existe";
                    $categoryImg =$_POST['categoryImg'];
                }
            }
            if($check){
                DBManagerCategories::updateCategory($catId,$categoryName,$categoryDescription,$categoryImg);
            }else{
                $_SESSION['error-message'] = $errorMsg;
            }
            $this->viewCategory($catId);
        }
    }
}