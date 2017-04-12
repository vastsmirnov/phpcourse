<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 08.02.2017
 * Time: 12:44
 */

namespace core;


class Validator
{


    public function run($fields,$label,$rules)
    {
        $error='';
        foreach ($fields as $value){
            if (!$rules[$value]()){
                $error[$value].=$rules[$value]." ";
            }
        }

        return $error;
    }
    

}