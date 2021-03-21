<?php


namespace Core\Framework;


abstract class BaseModel
{

    protected $connection;

    function __construct()
    {
       $instance =  Database::instance();
       $this->connection = $instance->getConnection();
    }


}