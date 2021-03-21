<?php


namespace Core\Framework;


class Request
{
    protected $request = [];

    protected $files = [];

    function __construct($request,$files,$server)
    {

        $this->request = $request;

        foreach ($this->request as $k =>$v ) {
            $this->{$k} = $v;
        }
        foreach ($files as $k =>$v)
        {
            $this->request[$k] = $v;
        }
        foreach ($files as $k => $v){
            if ($v['tmp_name'] !=''){
                $this->request[$k] = $v;
                $this->{$k} = $v;
            }else{
                unset($files[$k]);
            }
        }
        $this->files   = $files;

    }

    function get($key)
    {
        return $this->{$key} ?? null ;
    }

    function files()
    {
        return $this->files;
    }

    function file($key)
    {
        return $this->files[$key];
    }

    function hasFile($key)
    {
        return isset($this->files[$key]);
    }



    function toArray(){
        return $this->request;
    }



}