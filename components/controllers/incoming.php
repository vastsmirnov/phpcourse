<?php
namespace controllers;

use core\BaseController;
use core\DB;

class Incoming extends BaseController
{
    public function accessControl()
    {
        return array(
            '*'=>array('index','view'),
            'manager'=>array('edit','update','new_item','create'),
            'admin'=>array('remove')
        );
    }
    
    public function index()
    {
        $incoming = new \models\Incoming();
        $m=array(
            'model'=>$incoming->all()
        );
        $this->render('index',$m);
    }
    public function update($id){
        $incoming = new \models\Incoming();
        $incoming->update($id,$_POST);
        $this->localRedirect();

    }
    public function create(){
        $incoming = new \models\Incoming();
        $incoming->insert($_POST);
        $this->localRedirect();
    }
    public function remove($id){
        $incoming = new \models\Incoming();
        $incoming->remove($id);
    }

    public function view($id){
        $incoming = new \models\Incoming();
        $m=array(
            'model'=>$incoming->Byid($id)
        );
        $this->render('view',$m);
    }

    public function edit($id)
    {
        $incoming = new \models\Incoming();
        $m=array(
            'model'=>$incoming->Byid($id)
        );
        $this->render('edit',$m);
    }
    public function new_item()
    {
        $incoming = new \models\Incoming();
        $m=array(
            'model'=>$incoming
        );
        $this->render('new',$m);
    }
    

}
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 16.12.2016
 * Time: 19:02
 */