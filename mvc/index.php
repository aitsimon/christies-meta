<?php
session_start();
//Incluyo los archivos necesarios
require("./controller/Controller.php");
require("./controller/FrontController.php");
require("./model/DBAdmin.php");
//Instancio el controlador
$controller = new Controller();
$front_controller = new FrontController();

//Ruta de la home
$home = "/christies-meta/mvc/index.php/";
//Quito la home de la ruta de la barra de direcciones
//echo $_SERVER["REQUEST_URI"];
//echo '<br>';
$path = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_path = array_filter(explode("/", $path));
//Decido la ruta en función de los elementos del array
if (isset($array_path[0]) && $array_path[0] == 'admin' && $array_path[1] == 'login' && !isset($array_path[2])) {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("Location: dashboard");
    } else {
        $controller->showLogin();
    }
} else if (isset($array_path[0]) && $array_path[0] != 'admin') {
    $front_controller->showHome();
} else if (isset($array_path[0]) && $array_path[0] == 'admin' && $array_path[1] == 'login' && isset($array_path[2]) && $array_path[2] == 'process') {
    $controller->processLogin();
} else if ($array_path[1] == 'dashboard' && !isset($array_path[2])) {
    $controller->showDashboardHome();
} else if ($array_path[1] == 'dashboard' && isset($array_path[2])) {
    if ($array_path[2] == 'categories') {
        $controller->showDashboardCategories();
    } else if ($array_path[2] == 'objects') {

    } else if ($array_path[2] == 'users') {

    }else if ($array_path[2] == 'logout'){
        $controller->dashboardLogout();
    }
} else {
    //por defecto sino pone nada mas que index.php o index.php/ entrar front
    $front_controller->showHome();
}
?>