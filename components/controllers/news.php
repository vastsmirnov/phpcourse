<?php
namespace controllers;

use core\BaseController;
use core\DB;
use models\Group;
use models\User;

class News extends BaseController
//или написать вместо USE \core\BaseController
{
    public function index()
    {
//        $user = new User();
//        $user->byId(7);
//        var_dump($user->getGroup());
        $group = new Group();
        $group->byId(1);
        var_dump($group->getUsers());
        exit;

//        $m = array(
//            'title'=>'Сепер заголовок!',
//            'content'=>'Супер контент!',
//            'users' => $user->update(3,array(
//               'login'=>'ggg',
//                'password'=>'asd'
//            ))
//        );
//        $this->render('index',$m);
    }
    public function update($id){

    }
    public function create(){
        return "Создать элемент коллекции";
    }
    public function remove($id){
        return "Удалить элемент коллекции";
    }
    public function view($id){
        $this->render('view',array('id'=>$id));
    }
}
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 16.12.2016
 * Time: 19:02
 */