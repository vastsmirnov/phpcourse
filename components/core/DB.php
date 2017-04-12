<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 20.01.2017
 * Time: 18:00
 */

namespace core;


class DB
{
    private static $_inst = null;
    public static $_link =  null;

    private function __construct()
    {
        $c = ConfigManager::get();

        try {
            self::$_link = new \PDO($c['dsn'],$c['db_user'],$c['db_pass']);
        } catch (\PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

    }

    protected function __clone()
    {

    }

    public static function inst()
    {
        if (is_null(self::$_inst)) {
            self::$_inst = new self();
        }
        return self::$_inst;
    }

    public function prepare($sql)
    {
        $sth = self::$_link->prepare($sql);
        return function ($conditions = array()) use ($sth) {
            $res = $sth->execute($conditions);
            if ($res != null) {
                return $sth->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        };

    }

}
