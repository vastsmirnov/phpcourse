<?php
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 21.12.2016
 * Time: 20:22
 */

namespace core;


class Request
{
    private $_default_request_param = "";
    private $_default_controller = "";
    private $_default_action = "";

    public function __construct()
    {
        $c=ConfigManager::get();
        $this->_default_request_param=$c['default_request_param'];
        $this->_default_controller=$c['default_controller'];
        $this->_default_action=$c['default_action'];
    }
    public function parse(){
        $r_method = $this->calcRouteMethod();
        if ($_REQUEST){
            $r_string = $_REQUEST[$this->_default_request_param];
        } else {
            $r_string = NULL;
        }
        return array(
            "controller"=>$this->calcController($r_string),
            "action"=>$this->calcAction($r_string,$r_method),
            "id"=>$this->calcID($r_string),
            "route_method"=>$this->calcRouteMethod(),
            "post_param"=>$this->calcPostParams()
        );
    }
    private function calcController($r)
    {
        $res= "controllers\\";
        if ($r){
            $n = explode("/",$r);
            if (strtolower($n[0])=='authenticate'){
                $res="core\\";
            }
            $res.=$n[0];
        } else {
           $res.=$this->_default_controller;
        }
        return $res;

    }
    private  function testMethod($class,$method)
    {
        $res=false;
        if (method_exists($obj=new $class(),$method)){
            $res=true;
        }
        return $res;
    }
    private function calcAction($r,$m)
    {
        $r=strtolower($r);
        $action='error';
        $n = explode("/", $r);
        $id=$this->calcID($r);
       if ($id){
           switch ($m){
               case "GET":
                   if (isset($n[1]) && $n[1]==$id){
                       $action='view';
                   } elseif($this->testMethod($this->calcController($r), $n[1])){
                       $action = $n[1];
                   }
                   break;
               case "POST":
                   if(isset($n[1])&&$this->testMethod($this->calcController($r), $n[1])){
                   $action=$n[1];
               } elseif (isset($n[1]) && $n[1]==$id){
                       $action='update';
                   }
                   break;
               case "DELETE":
                   if (isset($n[1]) && $n[1]==$id){
                       $action='remove';
                   }
                   break;
           }
           
           
       } else {
           switch ($m){
               case "GET":
                   if ($r==null || !isset($n[1])){
                       $action='index';
                   } elseif (isset($n[1]) && $this->testMethod($this->calcController($r), $n[1])){
                       $action = $n[1];
                   }
                   break;
               case "POST":
                   if (isset($n[1])){
                       if ($this->testMethod($this->calcController($r), $n[1])) {
                           $action = $n[1];
                       }
                   }
                   break;
           }
       }
        return $action;
    }
    private function calcID($r)
    {
        $id=NULL;
        if (isset($r)){
            $n = explode("/", $r);
            $last=array_pop($n);
            if(isset($last) && intval($last)){
                $id=$last;
            }

        }
        return $id;
    }

    private function calcRouteMethod()
    {
        $method=$_SERVER['REQUEST_METHOD'];

        if (isset($_POST['fake_method'])){
            $method=$_POST['fake_method'];
        }
        return $method;
    }
    private function calcPostParams()
    {
        return "";
    }


}