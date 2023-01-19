<?php

class ObjectController
{
    public function load_view($content,$template,$info){
        require($template);
    }
    public function viewObject($object_id){
        require ('model/session-control.php');
        $object = DBManagerObject::getObjectById($object_id);
        $info['object']=$object;
        $info['possibleCategories']=DBManagerCategories::getAllPossibleCategories();
        $info['title'] = $object->getName();
        $this->load_view('view/back-card-views/card-objects.php','view/template.php',$info);
    }
    public function addObject(){
        require ('model/session-control.php');
        $info = array();
        $info['title'] = 'New Object';
        $this->load_view('view/back-card-views/card-object-add.php','view/template.php',$info);
    }
}