<?php
include 'model/DBManagerCategories.php';
$gestor = new DBManagerCategories();
$categories = $gestor->getAllCategories();
var_dump($categories);
echo "<br><hr><br>";
echo $gestor->insertCategory(4,'test','test','test');
var_dump($categories);