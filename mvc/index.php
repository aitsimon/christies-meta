<?php
session_start();
//Incluyo los archivos necesarios
require("./controller/LoginController.php");
require("./model/DBAdmin.php.php");
//session_start();
//Instancio el controlador
$controller = new Controller();

//Ruta de la home
$home = "/proyectoi/christies-meta/backend/mvc/index.php/";
//Quito la home de la ruta de la barra de direcciones
//echo $_SERVER["REQUEST_URI"];
//echo '<br>';
$path = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_path = array_filter(explode("/", $path));
//Decido la ruta en función de los elementos del array
if (isset($array_path[0]) && $array_path[0] == "login" && !isset($array_path[1])) {
    $controller->showLogin();
} else if (isset($array_path[0]) && $array_path[0] == "login" && $array_path[1] == "process") {
    $controller->processLogin();
}
?>