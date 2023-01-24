<?php
include_once '../../model/Connection.php';
include_once '../../model/DBManagerObject.php';
include_once '../../model/Virtual_Object.php';
$action = $_POST['action'];

if($action === 'searchProducts'){
    //if(count(DBManagerObject::getObjectsByName($_POST['text']))>0){
        $_SESSION['objects-to-show']= DBManagerObject::getObjectsByName($_POST['text']);
   // }
    echo json_encode(array());
}