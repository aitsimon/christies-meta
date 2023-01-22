<?php

class FrontController
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function showlogin(){
        $info['title'] = 'Login';
        $this->load_view('view/front/login.php','view/front/template-front.php',$info);
    } public function showSignup(){
        $info['title'] = 'Sign up';
        $this->load_view('view/front/signup.php','view/front/template-front.php',$info);
    }
    public function procesSignup(){
        $_SESSION['error-message-front'] = '';
        $errorMsg = '';
        $check = true;
        $newEmail = $_POST['userEmail'];
        $newPassword = $_POST['userPassword'];
        $newRol = $_POST['userRol'];
        $newTokens = 100.00;
        $newTelph = $_POST['userTelph'];
        $usedEmails = DBManagerUsers::getAllEmails();
        if($newEmail==='') {
            $errorMsg .= 'Password field is empty';
            $check = false;
        }else{
            $emailRegex = "/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i";
            if(!preg_match($emailRegex,$newEmail)){
                $check=false;
                $errorMsg .= 'Email field invalid. Example: user@mail.com';
            }
            if(in_array($newEmail,$usedEmails,false)){
                $check=false;
                $errorMsg =  'This email has already been used. Try with another one.';
            }
        }
        if ($newPassword === '') {
            $errorMsg .= 'Password field is empty';
            $check = false;
        } else {
            $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/';
            if (!preg_match($regex, $newPassword)) {
                $errorMsg .= 'Password field invalid. At least one of the following characters: lowercase, uppercase, number and length equal or greater than 8 characters.';
                $check = false;
            }
        }
        if ($newRol === '') {
            $errorMsg .= 'Role field is empty';
            $check = false;
        } else {
            $possibleRoles = DBAdmin::getPossiblesRoles('rol');
            $_SESSION['roles'] = $possibleRoles;
            $_SESSION['check'] = in_array($newRol, $possibleRoles);
            $check2 = false;
            foreach ($possibleRoles as $_role) {
                if ($_role === $newRol) {
                    $check2 = true;
                }
            }
            if (!$check2) {
                $errorMsg .= "Role typed doesn't exist.";
                $check = false;
            }
        }

        if ($newTokens === '') {
            $errorMsg .= 'Tokens field is empty';
            $check = false;
        } else {
            if (gettype((double)$newTokens) !== 'double') {
                $errorMsg .= 'Token field invalid. Must be a double';
                $check = false;
            }
        }
        if ($newTelph === '') {
            $errorMsg .= 'Telephone field is empty';
            $check = false;
        } else {
            $regex = '/^\+((?:9[679]|8[035789]|6[789]|5[90]|42|3[578]|2[1-689])|9[0-58]|8[1246]|6[0-6]|5[1-8]|4[013-9]|3[0-469]|2[70]|7|1)(?:\W*\d){0,13}\d$/';
            if (!preg_match($regex, $newTelph)) {
                $errorMsg .= 'Telephone field invalid. Check again';
                $check = false;
            }
        }
        if ($check) {
            DBManagerUsers::insertUser($_POST['userEmail'],$newPassword,$newRol,$newTelph);
            $this->showHome();
            $_SESSION['front-login'] = true;
            $_SESSION['front-userId'] = DBManagerUsers::getMaxId()+1;
        } else {
            $_SESSION['error-message-front'] = $errorMsg;
            $this->showSignup();
        }
    }
    public function logout(){
        $info['title'] = 'Logout';
        $this->load_view('view/front/login.php','view/front/template-front.php',$info);
    }
    public function showHome()
    {
        $info['title'] = 'Home';
        $this->load_view('view/front/home.php','view/front/template-front.php',$info);
    }
    public function showList(){

    }
    public function showContact(){
        
    }

}