<?php
include_once '../../model/Connection.php';
include_once '../../model/DBManagerObject.php';
include_once '../../model/Virtual_Object.php';
$action = $_POST['action'];
if(isset($_POST['order'])){
    $order = $_POST['order'];
}
if($action === 'searchProducts'){
    $objects = array();
    if(count(DBManagerObject::getObjectsByName($_POST['text']))>0){
       $objects= DBManagerObject::getObjectsByName($_POST['text']);
    }
    echo json_encode($objects);
}else if($action ==='productsByCategory'){
    $objects = array();
    if(count(DBManagerObject::getAllObjectsFromCategory($_POST['text']))>0){
        $objects= DBManagerObject::getAllObjectsFromCategory($_POST['text']);
    }
    echo  json_encode($objects);
}else if($action ==='score'){
    $objects =DBManagerObject::getObjectsByLikes($order);
    echo json_encode($objects);
}else if($action ==='purchases'){
    $objects =DBManagerObject::getObjectsByPurchases($order);
    echo json_encode($objects);
}