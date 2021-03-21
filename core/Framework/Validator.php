<?php


namespace Core\Framework;
use Core\Framework\Database as DB;

class Validator
{
    public static $messages = [];
    public static $valid    = true;
    public static $data;
    public static $redirectTo = '';


    public static function redirectTo($url)
    {
        self::$redirectTo = $url;
    }
    public static function validate($data,$rules)
    {
        self::$data = $data;
        foreach ($data as $k => $v){
            if (!isset($rules[$k])){
                continue;
            }
            $validators = explode('|',$rules[$k]);
            self::$messages[$k] = [];
            foreach ($validators as $validator){
                $validatorParts = explode(':',$validator);
                if (count($validatorParts)==1){
                    self::{$validator}($k,$v);
                }else{
                    $args = explode(',',$validatorParts[1]);
                    self::{$validatorParts[0]}($k,$v,$args);
                }
            }
        }

        if (!self::$valid){
            $_SESSION['old']    = self::$data;
            $_SESSION['errors'] = self::$messages;

            header("Location:".self::$redirectTo);
        }
        return self::$valid;
    }

    public static function required($k,$v)
    {

        if (is_null($v) || $v == ''){
            self::$valid = false;
            array_push(self::$messages[$k],"The $k field is required.");
        }
    }

    public static function unique($k,$v,$args)
    {
        $conn =  DB::instance()->getConnection();
        $stmt = $conn->prepare("SELECT * FROM $args[0] WHERE `$args[1]`=?");
        $stmt->execute([$v]);
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($res){
            self::$valid = false;
            array_push(self::$messages[$k],"The $k has already been taken.");
        }
    }

    public static function min($k,$v,$args)
    {
        if (strlen($v)<$args[0]){
            self::$valid = false;
            array_push(self::$messages[$k],"The $k must be min $args[0] characters.");
        }
    }

    public static function confirm($k,$v,$args)
    {
        if ($v !== self::$data[$args[0]]){
            array_push(self::$messages[$k],"The $k confirmation does not match.");
            self::$valid = false;
        }
    }

    public static function integer($k,$v)
    {
        if (!is_int($v)){
            array_push(self::$messages[$k],"The $k must be an integer.");
            self::$valid = false;
        }
    }

    public static function exists($k,$v,$args)
    {
       $conn =  DB::instance()->getConnection();
       $stmt = $conn->prepare("SELECT * FROM $args[0] WHERE `$args[1]`=?");
       $stmt->execute([$v]);
       $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$res){
            array_push(self::$messages[$k],"The selected $k is invalid.");
            self::$valid = false;
        }
    }

    public static function max ($k,$v,$args)
    {
        if (strlen($v)>$args[0]){
            array_push(self::$messages[$k],"The $k may not be greater than :max characters.");
            self::$valid = false;
        }
    }

    public static function file($k,$v,$args)
    {
        File::setFile($v);
        if (!in_array(File::getExt(),$args)){
            array_push(self::$messages[$k],"File $k allowed formats ".implode(',',$args)." !");
            self::$valid = false;
        }
    }

    public static function numeric($k,$v)
    {
        if(!is_numeric($v)){
            array_push(self::$messages[$k],"The $k must be a number.");
            self::$valid = false;
        }
    }

}