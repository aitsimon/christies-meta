<?php

class CategoriesController
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function viewCategory($category_id){
        $category = DBManagerCategories::getCategoryById($category_id);
        $info['category']=$category;
        var_dump($info);
        $info['title'] = $category->getName();
        $this->load_view('view/back-card-views/card-categories.php','view/template.php',$info);
    }

    public function processCategory($action){
        if(isset($_POST['delete'])){
            $check = DBManagerCategories::deleteCategory($_POST['categoryId']);
            if($check){
                header('Location: ../categories');
            }else{
                $_SESSION['error-message'] = 'Category could not be deleted';
            }
        }else{
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $tipo = $_FILES["categoryImg"]["type"];
            $nombreArchivo = $_FILES["categoryImg"]["name"];
            $ext = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            $check = true;
            $catId =(int)$_POST['categoryId'];
            $categoryName = $_POST['categoryName'];
            $categoryDescription = $_POST['categoryDescription'];
            var_dump($_POST);
            $categoryUpper = (int)$_POST['categoryUpper'];

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
            }else{
                $temporal = $_FILES["categoryImg"]["tmp_name"];
                $pathtemp = "../../../view/categories-images/".$catId."";
                $path = "../../../view/categories-images/".$catId."/". $_FILES["categoryImg"]["name"];
                if(!is_dir($pathtemp)){
                    if (!mkdir($pathtemp) && !is_dir($pathtemp)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathtemp));
                    }
                }
                move_uploaded_file($temporal, $path);
            }
            if ($ext !== '.jpg'||$ext !== '.jpeg'||$ext !== '.png') {
                $errorMsg.= 'Invalid image type. Accepted image types: JPEG and PNG.';
            }else{

            }
            if($categoryUpper===0||$categoryUpper===1||$categoryUpper===2||$categoryUpper===3||$categoryUpper===4){
                    $errorMsg.= 'Upper category field invalid. Valid:(1,2,3,4)';
                    $check = false;
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