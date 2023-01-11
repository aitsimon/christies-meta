<?php
    if(!isset($_SESSION['login'])||!($_SESSION['login'])){
        header("Location: http://localhost/christies-meta/mvc/index.php/admin/login");
    }
?>