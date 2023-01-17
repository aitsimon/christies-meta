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
        $_SESSION['table-used']='categories';
        $this->load_view('view/categories.php','view/template.php',$info2);
    }
    public function showDashboardProducts(){
        require ('model/session-control.php');
        $info2 = array();
        $_SESSION['table-used']='object';
        $info2['title']='Products';
        $this->load_view('view/products.php','view/template.php',$info2);
    }
    public function showDashboardUsers(){
        require ('model/session-control.php');
        $info2 = array();
        $_SESSION['table-used']='user';
        $info2['title']='Users';
        $this->load_view('view/users.php','view/template.php',$info2);
    }
    public function showDashboardPurchases(){
        require ('model/session-control.php');
        $info2 = array();
        $_SESSION['table-used']='purchases';
        $info2['title']='Purchases';
        $this->load_view('view/purchases.php','view/template.php',$info2);
    }
    public function showDashboardComments(){
        require ('model/session-control.php');
        $info2 = array();
        $_SESSION['table-used']='comments';
        $info2['title']='Comments';
        $this->load_view('view/comments.php','view/template.php',$info2);
    }
    public function showDashboardContactForms(){
        require ('model/session-control.php');
        $info2 = array();
        $info2['title']='Contact Form';
        $this->load_view('view/contact-forms.php','view/template.php',$info2);
    }
    public function show404Page(){
        $info2=array();
        $info2['title'] = '404 page';
        $this->load_view('view/404.php','view/template.php',$info2);
    }
    public function testing(){
        require ('view/testing.php');
    }
}