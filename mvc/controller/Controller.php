<?php

class Controller
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function showLogin()
    {
        require('view/login.php');
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
        $info2 = array();
        $info2['title']='Dashboard';
        $this->load_view('view/dashboard-home2.php','view/template.php',$info2);
        //require ('view/dashboard-home.php');
    }
    public function showDashboardCategories(){
        require ('model/session-control.php');
        $info2 = array();
        $info2['title']='Categories';
        $this->load_view('view/categoriesv2.php','view/template.php',$info2);
    }
    public function show404Page(){
        $info2=array();
        $info2['title'] = '404 page';
        $this->load_view('view/404.php','view/template.php',$info2);
    }

}