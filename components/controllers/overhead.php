<?php
namespace controllers;

use core\BaseController;
use core\DB;
use models\User;

class Overhead extends BaseController
//или написать вместо USE \core\BaseController
{
    public function index()
    {
        $m=array();
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
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 16.12.2016
 * Time: 19:02
 */