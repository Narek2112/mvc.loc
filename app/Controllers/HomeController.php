<?php

namespace App\Controllers;
use Core\Framework\Request;
use Core\Framework\View;

class HomeController
{
    function index(Request $request){
        View::render('welcome');
    }
}