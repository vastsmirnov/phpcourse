<?php
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 11.01.2017
 * Time: 19:40
 */

namespace core;


class ConfigManager
{
    public static function get()
    {
     $config = include __DIR__.'/../../config/config.php';
     return $config;
    }

}