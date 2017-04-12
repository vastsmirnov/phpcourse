<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 10.02.2017
 * Time: 19:30
 */

namespace core;


class TokenManager
{
    public static function get()
    {

        $res=null;
       if (isset($_COOKIE['auth_token'])){
           $res=$_COOKIE['auth_token'];
    }
        return $res;
    }

    public static function init($user_model)
    {
        $auth = new Auth($user_model);
        $token=self::genToken();
        $start_date=self::getStartDate();
        $end_date=self::getEndDate();
        $auth->store($token,$start_date,$end_date);
        setcookie('auth_token',$token);

    }
    private static function getStartDate()
    {

        return date("Y-m-d H:i:s");
    }
    private static function getEndDate()
    {
        return date("Y-m-d H:i:s",time()+3600);
    }

    private static function genToken()
    {
        return uniqid();
    }

}