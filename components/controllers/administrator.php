<?php
namespace controllers;

use core\BaseController;

class Administrator extends BaseController

{
    public function accessControl()
    {
        return array(
            'admin'=>array('remove','index','view','edit','update','new_item','create')
        );
    }
        public function index()
    {
        $user = new \models\User();
        $groups = new \models\Group();
        $m=array(
            'model'=>$user->all(),
            'groups'=>$groups->all()
        );
        $this->render('index',$m);
    }

    public function update($id)
    {
        $user = new \models\User();
        $user->update($id,$_POST);
        $this->localRedirect();

    }
    public function edit($id)
    {
        $user = new \models\User();
        $groups = new \models\Group();
        $m=array(
            'model'=>$user->Byid($id),
            'group'=>$user->getGroup(),
            'groups'=>$groups->all()
        );
        $this->render('edit',$m);
    }
    public function create(){
        return "Создать элемент коллекции";
    }
    public function remove($id){
        return "Удалить элемент коллекции";
    }
    public function view($id){
        $user = new \models\User();
        $m=array(
            'model'=>$user->Byid($id),
            'group'=>$user->getGroup()
        );
        $this->render('view',$m);
    }
}
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 16.12.2016
 * Time: 19:02
 */