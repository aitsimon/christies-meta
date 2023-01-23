<?php
    if(!isset($_SESSION['front-login'])||!($_SESSION['front-login'])){
        header("Location: http://localhost/christies-meta/mvc/index.php/home");
    }
?>