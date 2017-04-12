<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 30.01.2017
 * Time: 17:45
 */

namespace models;

use core\BaseModal;

class Incoming extends BaseModal
{
    protected function fields()
    {
        return array('title','description','create_date','text');
    }
    protected function shortTableName()
    {
        return "incoming";
    }

}
