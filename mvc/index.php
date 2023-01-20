<?php
session_start();
//Incluyo los archivos necesarios
require("./controller/Controller.php");
require("./controller/FrontController.php");
require("./controller/UserController.php");
require("./controller/CategoriesController.php");
require("./controller/ObjectController.php");
require("./model/DBAdmin.php");
require ('./model/DBManagerUsers.php');
require ('./model/DBManagerCategories.php');
require ('./model/DBManagerComments.php');
require ('./model/DBManagerObject.php');
require ('./model/DBManagerPurchases.php');
//Instancio el controlador
$controller = new Controller();
$front_controller = new FrontController();
$user_controller = new UserController();
$category_controller = new CategoriesController();
$object_controller = new ObjectController();
//Ruta de la home
$home = "/christies-meta/mvc/index.php/";
//Quito la home de la ruta de la barra de direcciones
//echo $_SERVER["REQUEST_URI"];
//echo '<br>';
$path = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_path = array_filter(explode("/", $path));
//Decido la ruta en función de los elementos del array
if (isset($array_path[0]) && $array_path[0] === 'admin' && $array_path[1] === 'login' && !isset($array_path[2])) {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("Location: dashboard");
    } else {
        $controller->showLogin();
    }
} else if (isset($array_path[0]) && $array_path[0] !== 'admin') {
    $front_controller->showHome();
} else if (isset($array_path[0], $array_path[2]) && $array_path[1] === 'login' && $array_path[2] === 'process') {
    $controller->processLogin();
} else if ($array_path[1] === 'dashboard' && !isset($array_path[2])) {
    $controller->showDashboardHome();
} else if ($array_path[1] === 'dashboard' && isset($array_path[2])) {
    if ($array_path[2] === 'categories') {
        if(!isset($array_path[3])){
            $controller->showDashboardCategories();
        }else{
            if($array_path[3]==='process'){
               $category_controller->processCategory($_POST);
            }else if($array_path[3]==='add'){
                $category_controller->addCategory();
            }else{
                $category_controller->viewCategory($array_path[3]);
            }
        }
    } else if ($array_path[2] === 'products') {
        if(!isset($array_path[3])){
            $controller->showDashboardProducts();
        }else{
            if($array_path[3]==='process'){
                $object_controller->processObject($_POST);
            }else if($array_path[3]==='add'){
                    $object_controller->addObject();
                }else{
                    $object_controller->viewObject($array_path[3]);
                }
        }
    } else if ($array_path[2] === 'users') {
        if(!isset($array_path[3])){
            $controller->showDashboardUsers();
        }else{
            if($array_path[3]==='process'){
                $user_controller->processUser($_POST);
            }else if($array_path[3]==='add'){
                    $user_controller->addUser();
            }else{
                $user_controller->viewUser($array_path[3]);
            }
        }
    }else if($array_path[2] === 'purchases') {
        $controller->showDashboardPurchases();
    }else if($array_path[2] === 'comments'){
        $controller->showDashboardComments();
    }else if ($array_path[2] === 'contact-forms'){
        $controller->showDashboardContactForms();
    }else if ($array_path[2] === 'logout'){
        $controller->dashboardLogout();
    }else if($array_path[2] === 'testing'){
        $controller->testing();
    }
} else {
    //por defecto sino pone nada mas que index.php o index.php/ entrar front
    $controller->show404Page();
}
?>