<?php
include_once '../../model/Connection.php';
include_once '../../model/DBManagerObject.php';
include_once '../../model/Virtual_Object.php';
include_once '../../model/DBManagerCategories.php';
include_once '../../model/Category.php';

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
}else if($action ==='ptosByCat'){
    $category = $_POST['categoryId'];
    $objects = DBManagerObject::getAllObjectsFromCategory($category);
    echo json_encode($objects);
}else if($action ==='categoriesByName'){
    $categories = DBManagerCategories::getCatsNameLike($_POST['text']);
    echo json_encode($categories);
}else if($action ==='categoriesByDescription'){
    $categories = DBManagerCategories::getCatsDescriptionLike($_POST['text']);
    echo json_encode($categories);
}else if($action ==='scoreCat'){
    $categoriesIds = DBManagerCategories::getTop10CategoriesOverAllPopularity($_POST['order']);
    $categories = array();
    foreach ($categoriesIds as $id){
        $categories[] = DBManagerCategories::getCategoryById($id[0]);
    }
    echo json_encode($categories);
}else if($action ==='productsUser'){
    $categories = DBManagerObject::getAllPurchasedObjectsByUser($_POST['user']);
    echo json_encode($categories);
}