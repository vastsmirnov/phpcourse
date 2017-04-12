<?php
namespace core;


class Authenticate extends BaseController
{
    public function accessControl()
    {
        return array(
            '*'=>array('login','logout'),
        );
    }
    
    public function login()
    {
        if (isset($_POST['login'])&&isset($_POST['password'])){
           if (WebUser::login($_POST['login'],$_POST['password'])){
               echo "Вошли ура";
           } else {
               $error="Неверное имяили пароль.";
               $this->render('login',array('error'=>$error));
           }
        } else {
            $error="";
            $this->render('login',array('error'=>$error));
        }

    }
    
    public function logout($id)
    {

    }
}
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 16.12.2016
 * Time: 19:02
 */