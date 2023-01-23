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
            DBManagerUsers::insertUser($_POST['userEmail'], $newPassword, $newRol, $newTelph);
            $this->showHome();
            $_SESSION['front-login'] = true;
            $_SESSION['front-userId'] = DBManagerUsers::getMaxId() + 1;
        } else {
            $_SESSION['error-message-front'] = $errorMsg;
            $this->showSignup();
        }
    }

    public function logout()
    {
        $info['title'] = 'Logout';
        session_destroy();
        header("Location: home");

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

    public function showListDefault()
    {

    }

    public function showList()
    {
        $info = array();
        $objects = DBManagerObject::getObjectsByName('trip');
        $_SESSION['objects-to-show'] = $objects;
        if (isset($_SESSION['objects-to-show'])) {
            $info['objects'] = $_SESSION['objects-to-show'];
        }
        $info['title'] = 'List';
        $categoriesNames = DBManagerCategories::getAllNames();
        $info['possibleCategories'] = $categoriesNames;
        $this->load_view('view/front/list.php', 'view/front/template-front.php', $info);
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
            $regex = '/^[\s\w]{10,}$/';
            if (!preg_match($regex, $commentContent)) {
                $errorMsg .= '';
                $check = false;
            }
        }
        if ($check) {
            $mailer = new Mailer2('comercioaitor@gmail.com','comercioaitor@gmail.com','Contact Form from:'.$_POST['userEmail'],$_POST['userComment']);
            $mailer->mandarMail();
        }
        header('Location: ../home');
    }
    public function processBuy($product_id){
        $user = DBManagerUsers::getUserById($_SESSION['userLogedIn']);
        $object = DBManagerObject::getObjectById($product_id);

        if($user->getTokens()>=$object->getPrice()){
            $prevTokens = $user->getTokens();
            $check = DBManagerPurchases::insertPurchase($object->getObjectId(),$user->getUserId());
            if($check){
              $newTokens = $prevTokens-($object->getPrice());
              DBManagerUsers::updateUserTokens($newTokens,$user->getUserId());
              header("Location: ../../profile");
            }
        }else{
            $_SESSION['error-message-purchase'] = "You don't have enough tokens to purchase this product.";
            header("Location: ..");
        }

    }

}