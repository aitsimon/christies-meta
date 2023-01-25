<?php

class ObjectController
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function viewObject($object_id){
        require ('model/session-control.php');
        $object = DBManagerObject::getObjectById($object_id);
        $info['object']=$object;
        $info['possibleCategories']=DBManagerCategories::getAllPossibleCategories();
        $info['title'] = $object->getName();
        $this->load_view('view/back-card-views/card-objects.php','view/template.php',$info);
    }
    public function addObject(){
        require ('model/session-control.php');
        $info = array();
        $info['title'] = 'New Object';
        $info['possibleCategories']=DBManagerCategories::getAllPossibleCategories();
        $this->load_view('view/back-card-views/card-objects-add.php','view/template.php',$info);
    }
    public function processObject($action){
        require ('model/session-control.php');
        if(isset($_POST['delete'])){
            $check = DBManagerObject::deleteComment($_POST['objectId']);
            if($check){
                header('Location: ../products');
            }else{
                $_SESSION['error-message'] = 'Category could not be deleted';
            }
        }else if(isset($_POST['add'])){
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;

            $objectId =DBManagerObject::getNewMaxId();
            $objectName = $_POST['objectName'];
            if(isset($_POST['objectLatitude'])){
                $objectLatitude =(float) $_POST['objectLatitude'];
            }
            if(isset($_POST['objectLongitude'])){
                $objectLongitude =(float) $_POST['objectLongitude'];
            }
            $objectPrice = $_POST['objectPrice'];
            $objectCategory = $_POST['object-cat'];
            $objectImg1 = $_FILES['objectImg1']["tmp_name"];
            if(isset($_FILES['objectImg2'])){
                $objectImg2 = $_FILES['objectImg2']["tmp_name"];
            }
            if(isset($_FILES['objectImg2'])){
                $objectImg3 = $_FILES['objectImg3']["tmp_name"];
            }
            $mega = 1024 * 1024;

            if($objectName===''){
                $errorMsg.= 'Name field is empty';
                $check = false;
            }else{
                $regex = '/^[a-z\s\-]{2,20}$/mi';
                if(!preg_match($regex,$objectName)){
                    $errorMsg.= 'Name field invalid. No numbers or special characters allowed. Min length: 2. Max length: 20. ';
                    $check = false;
                }
            }
            if(!isset($objectLatitude)){
                $objectLatitude = NULL;
            }
            if(!isset($objectLongitude)){
                $objectLongitude = NULL;
            }
            if($objectPrice<=0){
                $errorMsg.= 'Price field invalid. Price must be greater than zero.';
                $check = false;
            }
            $temporal = $_FILES["objectImg1"]["tmp_name"];
            $fileName = $objectId."_1";
            $extension = pathinfo( $_FILES["objectImg1"]["name"], PATHINFO_EXTENSION );
            $newName = $fileName . "." . $extension;
            $path = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName}";
            if(move_uploaded_file($temporal, $path)){
                $objectImg1="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName}";
            }else{
                $check = false;
            }
            if(isset($objectImg2)){
                $temporal2 = $_FILES["objectImg2"]["tmp_name"];
                $fileName2 = $objectId."_2";
                $extension2 = pathinfo( $_FILES["objectImg2"]["name"], PATHINFO_EXTENSION );
                $newName2 = $fileName2 . "." . $extension2;
                $path2 = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName2}";
                if(move_uploaded_file($temporal2, $path2)){
                    $objectImg2="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName2}";
                }else{
                    $objectImg2 = NULL;

                }
            }
            if(isset($objectImg3)){
                $temporal3 = $_FILES["objectImg3"]["tmp_name"];
                $fileName3 = $objectId."_3";
                $extension3 = pathinfo( $_FILES["objectImg3"]["name"], PATHINFO_EXTENSION );
                $newName3 = $fileName3 . "." . $extension3;
                $path3 = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName3}";
                if(move_uploaded_file($temporal3, $path3)){
                    $objectImg3="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName3}";
                }else{
                    $objectImg2=NULL;
                }
            }
            $check2=false;
            if($check){
                $check2= DBManagerObject::insertObject($objectName,$objectLatitude,$objectLongitude,$objectPrice,$objectImg1,$objectImg2,$objectImg3,$objectCategory);
            }else{
                $_SESSION['error-message'] = $errorMsg;
            }
            if(!$check2){
                $this->addObject();
            }else{
                header("Location: ../products");
            }

        }else{
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;

            $objectId =(int)$_POST['objectId'];
            $objectName = $_POST['objectName'];
            if(isset($_POST['objectLatitude'])){
                $objectLatitude =(float) $_POST['objectLatitude'];
            }
            if(isset($_POST['objectLongitude'])){
                $objectLongitude =(float) $_POST['objectLongitude'];
            }
            $objectPrice = $_POST['objectPrice'];
            $objectCategory = $_POST['object-cat'];
            $objectImg1 = $_FILES['objectImg1']["tmp_name"];
            if(isset($_FILES['objectImg2'])){
                $objectImg2 = $_FILES['objectImg2']["tmp_name"];
            }
            if(isset($_FILES['objectImg2'])){
                $objectImg3 = $_FILES['objectImg3']["tmp_name"];
            }

            $mega = 1024 * 1024;

            if($objectName===''){
                $errorMsg.= 'Name field is empty';
                $check = false;
            }else{
                $regex = '/^[a-z\s\-]{2,20}$/i';
                if(!preg_match($regex,$objectName)){
                    $errorMsg.= 'Name field invalid. No numbers or special characters allowed. Min length: 2. Max length: 20. ';
                    $check = false;
                }
            }

            if(!isset($objectLatitude)){
                $objectLatitude = NULL;
            }
            if(!isset($objectLongitude)){
                $objectLongitude = NULL;
            }
            if($objectPrice<=0){
                $errorMsg.= 'Price field invalid. Price must be greater than zero.';
                $check = false;
            }
            $temporal = $_FILES["objectImg1"]["tmp_name"];
            $fileName = $objectId."_1";
            $extension = pathinfo( $_FILES["objectImg1"]["name"], PATHINFO_EXTENSION );
            $newName = $fileName . "." . $extension;
            $path = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName}";
            if(move_uploaded_file($temporal, $path) || file_exists($path)){
                $objectImg1="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName}";
            }else{
                $check = false;
            }
            if(isset($objectImg2)){
                $temporal2 = $_FILES["objectImg2"]["tmp_name"];
                $fileName2 = $objectId."_2";
                $extension2 = pathinfo( $_FILES["objectImg2"]["name"], PATHINFO_EXTENSION );
                $newName2 = $fileName2 . "." . $extension2;
                $path2 = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName2}";
                if(move_uploaded_file($temporal2, $path2)|| file_exists($path2)){
                    $objectImg2="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName2}";
                }else{
                    $objectImg2 = NULL;
                }
            }
            if(isset($objectImg3)){
                $temporal3 = $_FILES["objectImg3"]["tmp_name"];
                $fileName3 = $objectId."_3";
                $extension3 = pathinfo( $_FILES["objectImg3"]["name"], PATHINFO_EXTENSION );
                $newName3 = $fileName3 . "." . $extension3;
                $path3 = $_SERVER['DOCUMENT_ROOT']."/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName3}";
                if(move_uploaded_file($temporal3, $path3)|| file_exists($path3)){
                    $objectImg3="http://localhost/christies-meta/mvc/view/categories-images/".$_POST['object-cat']."/{$newName3}";
                }else{
                    $objectImg2=NULL;
                }
            }
            if($check){

                DBManagerObject::updateObject($objectId,$objectName,$objectLatitude,$objectLongitude,$objectPrice,$objectImg1,$objectImg2,$objectImg3,$objectCategory);
            }else{
                echo 'jh';
                $_SESSION['error-message'] = $errorMsg;
            }
            //header("Location: ../products/".$objectId);
        }
    }
}