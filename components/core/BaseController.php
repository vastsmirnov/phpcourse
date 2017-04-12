<?php
/**
 * Created by PhpStorm.
 * User: boss
 * Date: 11.01.2017
 * Time: 18:58
 */

namespace core;


class BaseController
{
    public $layout = "";

    private $_default_request_param = "";

    public function __construct()
    {
        $c=ConfigManager::get();
        $this->_default_request_param=$c['default_request_param'];
        $this->layout=$c['default_layout'];
    }

    protected function render($view_part,$data)
    {
        Renderer::put($this,$view_part,$data);

    }

    protected function localRedirect()
    {
     header("Location: ?".$this ->_default_request_param."=".$this->shortControllerName());
        die();
    }
    public function defaultRedirect()
    {

    }


    public function shortControllerName()
    {
        $n = explode("\\",get_class($this));
        return $n[1];
    }
    public function error()
    {
        echo "Страница ошибки";
        exit;
    }
    public function forbidden()
    {
        echo "Недостаточно прав!";
        exit;
    }
    public function accessControl()
    {
        return array();
    }
    public function authorize($action)
    {
        $res=false;
        $access_list=$this->accessControl();
        foreach ($access_list as $key=>$value) {
            if (in_array($action, $value) && WebUser::isGroup($key)) {
                $res = true;
            }
        }

        return $res;
    }
}