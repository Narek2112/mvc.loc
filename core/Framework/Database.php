<?php


namespace Core\Framework;


class Database
{
    use Singletone;

    protected  $connection;

    protected function __construct()
    {
        $configs = extract(require_once CONF.'/db.php');
        try {
            $conn = new \PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
        } catch(\PDOException $e) {
            abort("Check db credentials /config/db.php");
        }


    }

    function getConnection()
    {
        return $this->connection;
    }
}