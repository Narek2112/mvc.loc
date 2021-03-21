<?php


namespace Core\Framework;


class File
{
    public static $file;
    public static $src;


    public static function setFile($file)
    {
        self::$file = $file;
    }
    
    
    public static function store($file,$path,$name = '')
    {
        self::$file = $file;
        $fullPath = self::getFullPath($path,$name);
        try {
            move_uploaded_file($file['tmp_name'],$fullPath);
            return self::$src;
        }catch(\Exception $e) {
            throw new \Error('13');
        }

    }

    public static function getExt()
    {
        $path_parts = pathinfo(self::$file["name"]);
        $ext = $path_parts['extension'];

        return $ext;
    }

    public static function getName()
    {
        $path_parts = pathinfo(self::$file["name"]);
        return $path_parts['filename'];
    }

    public static function getFullPath($path,$name)
    {
        $name = $name == '' ? self::getName() : $name;
        self::$src = $path.'/'.$name.'.'.self::getExt();
        if (is_file(PUBLIC_PATH.self::$src)){
            $name.='_'.time();
            self::$src = $path.'/'.$name.'.'.self::getExt();
        }
        return PUBLIC_PATH.'/'.$path.'/'.$name.'.'.self::getExt();
    }

    /**
     * @param string $src
     * @return void
     */
    public static function delete(string $src):void
    {
        if (is_file(PUBLIC_PATH.$src)){
            unlink(PUBLIC_PATH.$src);
        }
    }
}