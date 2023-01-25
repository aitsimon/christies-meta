<?php

class FrontController
{
    public function load_view($content, $template, $info)
    {
        require($template);
    }

    public function showlogin()
    {
        $info['title'] = 'Login';
        $this->load_view('view/front/login.php', 'view/front/template-front.php', $info);
    }

    public function processLogin()
    {
        $emailEntered = $_POST['userEmail'];
        $passwordEntered = $_POST['userPassword'];

        if (DBAdmin::loginFront($emailEntered, $passwordEntered)) {
            header("Location: ../home");

            $_SESSION['front-login'] = true;
            $user = DBManagerUsers::getUserByEmail($emailEntered);
            $_SESSION['front-userId'] = $user->getUserId();
            $_SESSION['userLogedIn'] = $user;
        } else {
            $_SESSION['error-message-front'] = 'Invalid credentials given. Please try again.';
            header("Location: ../login");
        }
    }

    public function showSignup()
    {

        $info['title'] = 'Sign up';
        $this->load_view('view/front/signup.php', 'view/front/template-front.php', $info);
    }

    public function procesSignup()
    {
        $_SESSION['error-message-front'] = '';
        $errorMsg = '';
        $check = true;
        $userEmail = $_POST['userEmail'];
        $newPassword = $_POST['userPassword'];
        $newRol = $_POST['userRol'];
        $newTokens = 100.00;
        $newTelph = $_POST['userTelph'];
        $usedEmails = DBManagerUsers::getAllEmails();
        if ($userEmail === '') {
            $errorMsg .= 'Password field is empty';
            $check = false;
        } else {
            $emailRegex = "/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i";
            if (!preg_match($emailRegex, $userEmail)) {
                $check = false;
                $errorMsg .= 'Email field invalid. Example: user@mail.com';
            }
            if (in_array($userEmail, $usedEmails, false)) {
                $check = false;
                $errorMsg = 'This email has already been used. Try with another one.';
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
            $check2 = DBManagerUsers::insertUser($_POST['userEmail'], $newPassword, $newRol, $newTelph);
            if($check2){
                $_SESSION['front-login'] = true;
                $newUser = DBManagerUsers::getUserByEmail($_POST['userEmail']);
                $_SESSION['front-userId'] = $newUser->getUserId();
                header('Location: ../home');
            }
        } else {
            $_SESSION['error-message-front'] = $errorMsg;
            header('Location: ../signup');

        }

    }

    public function logout()
    {
        $info['title'] = 'Logout';
        session_destroy();
        header("Location: home");

    }
    public function showCategories(){
        $info['title'] = 'Categories';
        $categories = DBManagerCategories::getAll();
        $info['categories'] = $categories;
        $this->load_view('view/front/categories.php','view/front/template-front.php',$info);
    }

    public function showHome()
    {
        $info['title'] = 'Home';
        $this->load_view('view/front/home.php', 'view/front/template-front.php', $info);
    }

    public function processNavSearch()
    {
        $objects = DBManagerObject::getObjectsByName($_POST['search']);
        $_SESSION['objects-to-show'] = $objects;
        $this->showList();
    }

    public function showList()
    {
        $info = array();
        $info['title'] = 'List';
        $categoriesNames = DBManagerCategories::getAllNames();
        $info['possibleCategories'] = $categoriesNames;
        $this->load_view('view/front/list.php', 'view/front/template-list.php', $info);
    }

    public function showProduct($productId)
    {
        $object = DBManagerObject::getObjectById($productId);
        $info['object'] = $object;
        $info['title'] = 'Overview ' . $object->getName();
        $info['commentsOfObject'] = DBManagerComments::getCommentsByObjectId($object->getObjectId());
        $this->load_view('view/front/product.php', 'view/front/template-front.php', $info);
    }

    public function addComment()
    {
        $content = $_POST['commentContent'];
        $objectId = $_POST['commentObjectId'];
        $userId = $_POST['commentUserId'];
        $check = DBManagerComments::insertComment($content, $objectId, $userId);
        if ($check) {
            $check2 = DBMScore::getScoreProductById($objectId);
            if (!$check2) {
                DBMScore::insertNewScore($objectId);
            } else {
                DBMScore::updateScore($objectId, $check2 + 1);
            }
        }
        header('Location: ../list/' . $objectId);
    }

    public function showProfile()
    {
        require('model/session-control-front.php');
        $info['title'] = 'Profile';
        $info['user'] = DBManagerUsers::getUserById($_SESSION['front-userId']);
        $this->load_view('view/front/profile.php', 'view/front/template-front.php', $info);
    }
    public function editProfile(){
        require('model/session-control-front.php');
        $newTelph  = $_POST['userTelph'];
        $_SESSION['error-message'] = '';
        $errorMsg = '';
        $check = true;

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
            DBManagerUsers::updateUserTelph($newTelph, (int)$_POST['userId']);
        } else {
            $_SESSION['error-message'] = $errorMsg;
        }
        header('Location: ../profile');
    }
    public function deleteUser(){
        
        $check = DBManagerUsers::deleteUser((int)$_SESSION['front-userId']);
        if ($check) {
           session_destroy();
            header('Location: ../home');
        } else {
            $_SESSION['error-message'] = 'User could not be deleted';
            header('Location: ../profile');
        }

    }
    public function showContact()
    {
        $info['title'] = 'Contact Form';
        $this->load_view('view/front/contact.php','view/front/template-front.php',$info);

    }
    public function processContact(){
        $_SESSION['error-message'] = '';
        $errorMsg = '';
        $check = true;

        $userEmail = $_POST['userEmail'];
        $userName = $_POST['userName'];
        $commentContent = $_POST['userComment'];
        $captcha = $_POST['g-recaptcha-response'];
        $captchaSecretKey = "6LfhaigkAAAAAE681ZdIVhOqKdCZz8oEyNnOuhly";

        if ($userEmail === '') {
            $errorMsg .= 'Email field is empty';
            $check = false;
        } else {
            $regex = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
            if (!preg_match($regex, $userEmail)) {
                $errorMsg .= 'Email field invalid. Enter a valid email address.';
                $check = false;
            }
        }
        if ($commentContent === '') {
            $errorMsg .= 'Comment field is empty';
            $check = false;
        } else {
            $regex = '/^[\s\w]{10,400}$/';
            if (!preg_match($regex, $commentContent)) {
                $errorMsg .= 'Message length error. Length must be between 10 and 400 characters';
                $check = false;
            }
        }
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$captchaSecretKey&response=$captcha");
        $decodedResponse = json_decode($response, true);
        if (!$decodedResponse['success']){
            $check =false;
            $errorMsg = 'Captcha not valid.';
        }

        if ($check) {
            $mailer = new Mailer2('comercioaitor@gmail.com','comercioaitor@gmail.com','Contact Form from:'.$_POST['userEmail'],$_POST['userComment']);
            $mailer->mandarMail();
            DBMContactForms::insertContact($userName,$userEmail,$commentContent);
            header('Location: ../home');
        }else{
            $_SESSION['error-message'] = $errorMsg;
            header("Location: ../contact");
        }
    }
    public function buyCompleted(){
        require('model/session-control-front.php');
        $info['title'] = 'Purchase completed';
        $this->load_view('view/front/buy-completed.php','view/front/template-front.php',$info);
    }
    public function buyError(){
        require('model/session-control-front.php');
        $info['title'] = 'Purchase error';
        $this->load_view('view/front/buy-error.php','view/front/template-front.php',$info);
    }
    public function processBuy($product_id){
        require('model/session-control-front.php');
        $user = DBManagerUsers::getUserById($_SESSION['front-userId']);
        $object = DBManagerObject::getObjectById($product_id);

        if($user->getTokens()>=$object->getPrice()){
            $prevTokens = $user->getTokens();
            $check = DBManagerPurchases::insertPurchase($object->getObjectId(),$user->getUserId());
            if($check){
              $newTokens = $prevTokens-($object->getPrice());
              DBManagerUsers::updateUserTokens($newTokens,$user->getUserId());
              $_SESSION['bought-object'] = $object->getObjectId();
              $mailer = new Mailer2('comercioaitor@gmail.com',$user->getEmail(),'Purchase Christies & Meta:'.(DBManagerUsers::getUserById($_SESSION['front-userId']))->getEmail(),'You have successfully purchased an item at Christies & Meta: '.$object->getName(). '\n for'.$object->getPrice().' tokens value.');
              $mailer->mandarMail();
              header("Location: ./completed");
            }
        }else{
            $_SESSION['error-message-purchase'] = "You don't have enough tokens to purchase this product.";
            header("Location: ./error");
        }

    }

}