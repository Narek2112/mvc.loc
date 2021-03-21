<?php


namespace App\Helpers;


use App\Models\User;

class Auth
{

    public static function user()
    {
        return $_SESSION['user'] ?? null;
    }

    public static function logout()
    {
        $_SESSION = [];
        $redirect = url("/admin/login");
        header("Location: $redirect");
    }

    public static function login($data)
    {
        $user = new User();
        $success = $user->login($data);
        if ($success){
            $url = url('/admin/home');
            header("Location: $url");
        }else{
            $url = url('/admin/login');
            header("Location: $url");
        }
    }

}