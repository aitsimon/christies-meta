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
        $this->load_view('view/back-card-views/card-object-add.php','view/template.php',$info);
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

            $objectId = $_POST['objectId'];
            $objectName = $_POST['objectName'];
            if(isset($_POST['objectLatitude'])){
                $objectLatitude = $_POST['objectLatitude'];
            }
            if(isset($_POST['objectLongitude'])){
                $objectLongitude = $_POST['objectLongitude'];
            }
            $objectPrice = $_POST['objectPrice'];
            $objectCategory = $_POST['objectCategory'];
            $objectImg1 = $_POST['objectImg1'];
            if(isset($_POST['objectImg2'])){
                $objectImg2 = $_POST['objectImg2'];
            }
            if(isset($_POST['objectImg3'])){
                $objectImg3 = $_POST['objectImg3'];
            }

            $mega = 1024 * 1024;
            $tam = $_FILES["categoryImg"]["size"];






        }else{

        }
    }
}