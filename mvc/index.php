<?php
session_start();
//Incluyo los archivos necesarios
require("./controller/LoginController.php");
//session_start();
//Instancio el controlador
$controller = new Controller();

//Ruta de la home
$home = "/proyectoi/christies-meta/backend/mvc/index.php/";
//Quito la home de la ruta de la barra de direcciones
//echo $_SERVER["REQUEST_URI"];
//echo '<br>';
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));
//Decido la ruta en función de los elementos del array
if (isset($array_ruta[0]) && $array_ruta[0] == "login" && !isset($array_ruta[1])){
    $controller->showLogin();
}
?>