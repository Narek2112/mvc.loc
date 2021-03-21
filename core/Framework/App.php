<?php

namespace Core\Framework;
use Core\Framework\Router;
class App
{

    public static $app;

    public function __construct()
    {


        if (isset($_SERVER['QUERY_STRING']))
            $path = $_SERVER['QUERY_STRING'] == '' ? '/' : '/'.$_SERVER['QUERY_STRING'];
        else
            abort("Apache Web Server Only");

        if (Router::matchRoute($path,$_SERVER['REQUEST_METHOD'])){
            Router::run();
        }else{
           abort("URL $path not found");
        }

    }
}