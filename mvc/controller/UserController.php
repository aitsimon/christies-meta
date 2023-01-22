<?php

class UserController
{
    public function load_view($content, $template, $info)
    {
        require($template);
    }

    public function viewUser($user_id)
    {
        require('model/session-control.php');
        $user = DBManagerUsers::getUserById($user_id);
        $info['user'] = $user;
        $info['title'] = $user->getEmail();
        $info['possibleRoles'] = DBAdmin::getPossiblesRoles('rol');
        $info['userComments'] = DBManagerComments::getCommentsByUserId($user_id);
        $this->load_view('view/back-card-views/card-user.php', 'view/template.php', $info);
    }

    public function addUser()
    {
        require ('model/session-control.php');
        $info['title'] = "Add User";
        $info['possibleRoles'] = DBAdmin::getPossiblesRoles('rol');
        $this->load_view('view/back-card-views/card-user-add.php', 'view/template.php', $info);
    }
    public function signup(){
        $_SESSION['error-message'] = '';
        $errorMsg = '';
        $check = true;
        $newPassword = $_POST['userPassword'];
        $newRol = $_POST['user-rol'];
        $newTokens = $_POST['userTokens'];
        $newTelph = $_POST['userTelph'];

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
            DBManagerUsers::updateUser($newPassword, $newRol, (double)$newTokens, $newTelph, (int)$_POST['userId']);
        } else {
            $_SESSION['error-message'] = $errorMsg;
        }
        $this->viewUser($_POST['userId']);
    }
    public function processUser($action)
    {
        require ('model/session-control.php');
        if (isset($_POST['delete'])) {
            $check = DBManagerUsers::deleteUser($_POST['userId']);
            if ($check) {
                $_SESSION['status'] = DBManagerUsers::deleteUser($_POST['userId']);
                header('Location: ../users');
            } else {
                $_SESSION['error-message'] = 'User could not be deleted';
            }
        }else if (isset($_POST['edit-comment'])){
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;
            $commentId = $_POST['commentId'];
            $commentContent = $_POST['commentContent'];

            if(strlen($commentContent)<=3){
                $errorMsg .= 'Comment content must have a length equal or greater than 3.';
                $check = false;
            }
            if($check){
               DBManagerComments::updateComment($commentContent,$commentId);
            }else{
                $_SESSION['error-message'] = $errorMsg;
            }
            $this->viewUser($_POST['userId']);

        }else if (isset($_POST['delete-comment'])){
            DBManagerComments::deleteComment($_POST['commentId']);
            $this->viewUser($_POST['userId']);
        } else if (isset($_POST['add'])) {
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;
            $newEmail = $_POST['userEmail'];
            $newPassword = $_POST['userPassword'];
            $newRol = $_POST['user-rol'];
            $newTokens = $_POST['userTokens'];
            $newTelph = $_POST['userTelph'];


            if ($newEmail === '') {
                $errorMsg .= 'Email field is empty';
                $check = false;
            } else {
                $regex = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
                if (!preg_match($regex, $newEmail)) {
                    $errorMsg .= 'Email field invalid. Enter a valid email address.';
                    $check = false;
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
            $check3 = false;
            if ($check) {
                $check3 = DBManagerUsers::insertUser($newEmail, $newPassword, $newRol, $newTelph);
            } else {
                $_SESSION['error-message'] = $errorMsg;
            }
            if (!$check3) {
                $this->addUser();
            } else {
                header('Location: ../users');
            }
        } else {
            $_SESSION['error-message'] = '';
            $errorMsg = '';
            $check = true;
            $newPassword = $_POST['userPassword'];
            $newRol = $_POST['user-rol'];
            $newTokens = $_POST['userTokens'];
            $newTelph = $_POST['userTelph'];

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
                DBManagerUsers::updateUser($newPassword, $newRol, (double)$newTokens, $newTelph, (int)$_POST['userId']);
            } else {
                $_SESSION['error-message'] = $errorMsg;
            }
            $this->viewUser($_POST['userId']);
        }
    }
}