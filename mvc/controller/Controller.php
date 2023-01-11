<?php

class Controller
{
    public function showLogin()
    {
        require('view/back/login.php');
    }
    public function processLogin(){
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email =$_POST['email'];
            $password =$_POST['password'];
            $success = DBAdmin::login($email, $password);
            if($success){
                $_SESSION['login'] = 'true';
                $_SESSION['email'] = $email;
                header("Location: ../dashboard");
            }else{
                header("Location: ../login");
            }
        }else{
            echo 'POST params not received';
        }
    }
    public function showDashboardHome(){
        require ('view/back/dashboard-home.php');
    }
}