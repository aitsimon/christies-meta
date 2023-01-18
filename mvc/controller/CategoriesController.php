<?php

class CategoriesController
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function viewCategory($category_id){
        $category = DBManagerCategories::getCategoryById($category_id);
        $info['category']=$category;
        $info['title'] = $category->getName();
        $info['possibleCategories'] =  DBAdmin::getPossiblesRoles('category');
        $this->load_view('view/back-card-views/card-categories.php','view/template.php',$info);
    }

    public function processCategory($action){
        if(isset($_POST['delete'])){
            $check = DBManagerUsers::deleteUser($_POST['categoryId']);
            if($check){
                $_SESSION['status']= DBManagerUsers::deleteUser($_POST['categoryId']);
                header('Location: ../categories');
            }else{
                $_SESSION['error-message'] = 'Category could not be deleted';
            }
        }else{
            /*
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;
            $newPassword = $_POST['userPassword'];
            $newRol = $_POST['user-rol'];
            $newTokens =$_POST['userTokens'];
            $newTelph = $_POST['userTelph'];

            if($newPassword===''){
                $errorMsg.= 'Password field is empty';
                $check = false;
            }else{
                $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/';
                if(!preg_match($regex,$newPassword)){
                    $errorMsg.= 'Password field invalid. At least one of the following characters: lowercase, uppercase, number and length equal or greater than 8 characters.';
                    $check = false;
                }
            }
            if($newRol===''){
                $errorMsg.= 'Role field is empty';
                $check = false;
            }else{
                $possibleRoles = DBAdmin::getPossiblesRoles('rol');
                $_SESSION['roles'] = $possibleRoles;
                $_SESSION['check'] = in_array($newRol,$possibleRoles);
                $check2 =false;
                foreach ($possibleRoles as $_role){
                    if($_role === $newRol){
                        $check2=true;
                    }
                }
                if(!$check2){
                    $errorMsg.= "Role typed doesn't exist.";
                    $check = false;
                }
            }

            if($newTokens===''){
                $errorMsg.= 'Tokens field is empty';
                $check = false;
            }else{
                if(gettype((double)$newTokens)!=='double'){
                    $errorMsg.= 'Token field invalid. Must be a double';
                    $check = false;
                }
            }
            if($newTelph===''){
                $errorMsg.= 'Telephone field is empty';
                $check = false;
            }else{
                $regex = '/^\+((?:9[679]|8[035789]|6[789]|5[90]|42|3[578]|2[1-689])|9[0-58]|8[1246]|6[0-6]|5[1-8]|4[013-9]|3[0-469]|2[70]|7|1)(?:\W*\d){0,13}\d$/';
                if(!preg_match($regex,$newTelph)){
                    $errorMsg.= 'Telephone field invalid. Check again';
                    $check = false;
                }
            }
            if($check){
                DBManagerUsers::updateUser($newPassword,$newRol,(double)$newTokens,$newTelph,(int)$_POST['userId']);
            }else{
                $_SESSION['error-message'] = $errorMsg;
            }
            $this->viewUser($_POST['userId']);*/
        }
    }
}