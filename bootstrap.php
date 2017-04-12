<?php
define('ROOT_DIR',dirname(__FILE__));
function autoload($className)
{
	$className = ltrim($className,'\\');
	$fileName = "";
	$namespace = "";
	
	$lastNsPos = strpos($className,'\\');
	if($lastNsPos){
		$namespace=substr($className,0, $lastNsPos);
		$className = substr($className,$lastNsPos+1);
		$fileName = str_replace('\\','/',$namespace).'/';
	}
	$fileName.=str_replace('_','/',$className).'.php';
	require __DIR__.'/components/'.$fileName;
}
spl_autoload_register('autoload');
