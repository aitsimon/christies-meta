<?php

class UserController
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function viewUser($user_id){
       $user = DBManagerUsers::getUserById($user_id);
       $info['user']=$user;
       $info['title'] = $user->getEmail();
       $info['possibleRoles'] =  DBAdmin::getPossiblesRoles('rol');
       $this->load_view('view/back-card-views/card-user.php','view/template.php',$info);
    }

}