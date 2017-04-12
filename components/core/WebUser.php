<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 08.02.2017
 * Time: 18:37
 */

namespace core;

use models\Group;



class WebUser
{
    
    public static function currentUser()
    {
        $c=ConfigManager::get();
        $a=new Auth(new $c['web_user_model']);
       return $a->authUser();
    }

    public static function login($login,$password)
    {
        $res=false;
        $c=ConfigManager::get();
        $user=new $c['web_user_model'];
        $user_data=$user->byField('login',$login);
        if (!empty($user_data)){
            $user_data=$user_data[0];
            if ($user_data['password']==$password){
                $res=true;
                TokenManager::init($user);
            }
            
        }

        return $res;
    }

    public static function group($web_user)
    {
        $res='';
        if ($web_user!=null){
            $res=$web_user->getGroup();
        }

        return $res;

    }

    private static function innerGroups()
    {
        $res=array();
        $c=ConfigManager::get();
        $group_model=new $c['web_user_group'];
        $web_user=self::currentUser();
        $current_group = self::group($web_user);
        if ($current_group!=null){
            $res[]=$current_group['name'];
            $parent_id=$current_group['id'];
            $flag=true;
            while($flag){
                $group=$group_model->byField('parent_id',$parent_id);
                if ($group!=null){
                    $group=$group[0];
                    $parent_id=$group['id'];
                    $res[]=$group['name'];
                }else {
                    $flag=false;
                }
            }
        }

        return $res;
    }

    public static function isGroup($group)
    {
        $res=false;
        if ($group=='*'){
            $res=true;
        }

        if (in_array($group,self::innerGroups())){
            $res=true;
        }
        
        return $res;
    }

}