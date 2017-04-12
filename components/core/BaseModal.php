<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23.01.2017
 * Time: 17:43
 */

namespace core;


class BaseModal
{
    private $_schema;
    public $attributes=array();
    public function __construct()
    {
        $c=ConfigManager::get();
        $this->_schema=$c['db_schema'];
    }

    protected function shortTableName()
    {

    }
    protected function fields()
    {
        return [];
    }
    public function longTableName()
    {
        return $this->_schema.".".$this->shortTableName();

    }

    public function all()
    {
        $sql = "SELECT * FROM ".$this->longTableName();
        $e=DB::inst()->prepare($sql);
        return $e();
    }

    public function byId($id)
    {
        $sql = "SELECT * FROM ".$this->longTableName()." WHERE id=:id";
        $e=DB::inst()->prepare($sql);
        $res = $e(array(":id"=>$id));
        if (is_array($res) && !empty($res)){
            $this->attributes=$res[0];
            $res=$res[0];
        }
        return $res;
    }

    public function byField($field,$value)
    {
        $sql = "SELECT * FROM ".$this->longTableName()." WHERE ".$field."=:param";
        $e=DB::inst()->prepare($sql);
        $res = $e(array(":param"=>$value));
        if (is_array($res) && !empty($res)){
            $this->attributes=$res;
        }
        return $res;
    }

    public function remove($id)
    {
        $sql = "DELETE FROM ".$this->longTableName()." WHERE id=:id";
        $e=DB::inst()->prepare($sql);
        return $e(array(":id"=>$id));
    }

    public function insert($data)
    {
        $pdo_set=$this->pdoSet($this->fields(),$data);
        $sql = "INSERT INTO ".$this->longTableName()." SET ".$pdo_set['prepare_str'];
        $e=DB::inst()->prepare($sql);
        return $e($pdo_set['execute_arr']);
    }

    public function update($id,$data)
    {
        $pdo_set=$this->pdoSet($this->fields(),$data);
        $sql = "UPDATE ".$this->longTableName()." SET ".$pdo_set['prepare_str']." WHERE id=:id";
        $e=DB::inst()->prepare($sql);
        return $e(array_merge($pdo_set['execute_arr'],array(':id'=>$id)));
    }

    private function pdoSet($fields,$data)
    {
        $res = array();
        $prepare_str='';
        $execute_arr=array();
        foreach ($fields as $field){
            if (isset($data[$field])){
                $prepare_str.="`".$field."`=:".$field.", ";
                $execute_arr[":".$field]=$data[$field];
             }
         }
        $res['prepare_str']=rtrim($prepare_str,", ");
        $res['execute_arr']=$execute_arr;
        return $res;
    }

    public static function className()
    {

        return get_called_class();
    }
    public function hasOne($class,$key)
    {
        $ob=new $class;
        $res=$ob->byId($this->attributes[$key]);
        return $res;
    }

    public function hasMany($class,$key)
    {
        $ob=new $class;
        $sql = "SELECT * FROM ".$ob->longTableName()." WHERE ".$key."=:id";
        $e=DB::inst()->prepare($sql);
        $res = $e(array(":id"=>$this->attributes['id']));
        return $this->attributes=$res;
    }


}