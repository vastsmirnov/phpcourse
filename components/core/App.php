<?php
namespace core;
class App
{
   	public static function run()
	{
	    $req = new Request();
        $resp = new Response();
        $r=$req->parse();
        $resp->response($r);
	}
}