<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23.01.2017
 * Time: 17:55
 */

namespace models;

use core\BaseModal;

class Group extends BaseModal
{
    protected function fields()
    {
        return array('name','description');
    }
    protected function shortTableName()
    {
        return "groups";
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(),'group_id');
    }
}