<?php
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 16.01.2017
 * Time: 19:07
 */

namespace controllers;


use core\BaseController;

class posts extends BaseController
//или написать вместо USE \core\BaseController
{
    public function index(){
        $m = array(
            'title'=>'Сепер заголовок!',
            'content'=>'Супер контент!'
        );
        $this->render('index',$m);
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