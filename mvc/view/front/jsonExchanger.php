<?php


$action = $_POST['action'];

if($action === 'searchProducts'){
    DBManagerObject::searchByName($_POST['text']);
}