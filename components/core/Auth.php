<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 10.02.2017
 * Time: 17:59
 */

namespace core;


class Auth extends BaseModal
{
    private $_web_user_model = "";

    public function __construct($user_model)
    {
        $this->_web_user_model=$user_model;
        parent::__construct();
    }

    protected function fields()
    {
        return array('user_id','token','start_date','end_date');
    }
    protected function shortTableName()
    {
        return "auth";
    }
    public function getUser()
    {
        return $this->hasOne(get_class($this->_web_user_model),'user_id');
    }

    public function authUser()
    {
        $res='';
        if (!empty($this->byField('token',TokenManager::get()))){
            $this->attributes=$this->attributes[0];
            $user_data=$this->getUser();
            $res=$this->_web_user_model;
            $res->byId($user_data['id']);
        }
        return $res;
    }
    
    public function store($token,$start_date,$end_date)
    {
        $user_data=$this->_web_user_model->attributes[0];

        $this->insert(array(
            'user_id'=>$user_data['id'],
           'token'=>$token,
            'start_date'=>$start_date,
            'end_date'=>$end_date
        ));
    }


}