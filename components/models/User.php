<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23.01.2017
 * Time: 17:55
 */

namespace models;

use core\BaseModal;

class User extends BaseModal
{
    protected function fields()
    {
        return array('login','password','group_id');
    }
    protected function shortTableName()
    {
        return "users";
    }
    public function getGroup()
    {
        return $this->hasOne(Group::className(),'group_id');
    }
}