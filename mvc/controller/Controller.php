<?php

class Controller
{
    public function showLogin()
    {
        require('view/login.php');
    }
    public function processLogin(){
        $email =$_GET['email'];
        $password =$_GET['password'];
        $success = DBAdmin::login($email, $password);
    }
}