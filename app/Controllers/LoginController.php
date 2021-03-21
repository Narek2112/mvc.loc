<?php


namespace App\Controllers;
use Core\Framework\Request;
use Core\Framework\Validator;
use Core\Framework\View;
use App\Helpers\Auth;
use App\Models\User;
class LoginController
{
    public function index(Request $request)
    {
        View::render('auth.login',[],'auth');
    }

    public function login(Request $request)
    {
        $data  = $request->toArray();
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ] ;
        $validatorResponse = Validator::validate($data,$rules);
        if (!Validator::validate($data,$rules)){
            $url = url('/admin/login');
            header("Location: $url");
        }else{
            Auth::login($data);
        }
    }

    public function logout()
    {
        Auth::logout();
    }

}