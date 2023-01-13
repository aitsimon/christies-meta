<?php

class Controller
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function showLogin()
    {
        require('view/back/login.php');
    }
    public function processLogin(){
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email =$_POST['email'];
            $password =$_POST['password'];
            if(DBAdmin::login($email, $password)){
                $_SESSION['login'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['msg-error'] = '';

                header("Location: ../dashboard");
            }else{
                $_SESSION['msg-error'] = 'Error! Please check your credentials and try again.';
                header("Location: ../login");
            }
        }else{
            echo 'POST params not received';
        }
    }
    public function dashboardLogout(){
        session_destroy();
        header("Location: http://localhost/christies-meta/mvc/index.php/admin/login");
    }
    public function showDashboardHome(){
        require ('model/session-control.php');
        $this->load_view('view/back/dashboard-home2.php','view/back/template.php','');
        //require ('view/back/dashboard-home.php');
    }
    public function showDashboardCategories(){
        require ('model/session-control.php');
        $this->load_view('view/back/categoriesv2.php','view/back/template.php',"");
    }

}