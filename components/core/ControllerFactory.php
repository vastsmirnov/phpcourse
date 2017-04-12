<?php
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 21.12.2016
 * Time: 19:48
 */

namespace core;


class ControllerFactory
{
    public static function create($controller){
        return new $controller;
    }


}