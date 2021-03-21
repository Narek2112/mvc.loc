<?php
namespace App\Middleware;

class AuthCheckMiddleware {

    protected $redirectTo = '/admin/login';

    function __construct()
    {
        if (!$_SESSION['user']){
            header("Location: $this->redirectTo");
        }
    }
}