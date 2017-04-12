<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 15.02.2017
 * Time: 20:09
 */

namespace core;


class Can
{
    public static function can($r)
    {
        $c=explode('/',$r);
        $controller = new $c[0];
        return $controller->authorize($c[1]);
    }

}