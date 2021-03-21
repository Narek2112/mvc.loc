<?php


namespace Core\Framework;


trait Singletone
{
    private static $instance;

    private function __construct()
    {
    }

    public static function instance()
    {
        if (self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }


}