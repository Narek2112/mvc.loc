<?php


namespace App\Controllers;


use Core\Framework\Request;
use Core\Framework\Validator;
use Core\Framework\View;
use App\Helpers\AdminHelper;
use App\Helpers\Auth;
use App\Models\User;
use App\Middleware\AuthCheckMiddleware;
class AdminController
{
    use AdminHelper;

    function __construct()
    {
        new AuthCheckMiddleware();
        $this->user_model = new User();
    }


    public function index()
    {
        $user = new User();
        $admins = $this->user_model->getAllUsers();

        View::render('admin.admins.index',['admins'=>$admins],'default');
    }

    public function create()
    {
        return View::render('admin.admins.create',[],'default');
    }

    public function store(Request $request)
    {
        $data = $request->toArray();
        $rules = [
            'name'     => 'required|min:3',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'confirm_password' => 'required|confirm:password'
        ];
        if (!Validator::validate($data,$rules)){
            $url = url('/admin/admins/create');
            header("Location: $url");
            exit();
        }else{
            $this->user_model->insert($data);
            flash(['message'=>'Admin Created Successfully','class'=>'alert alert-success']);
            $url = url('/admin/home/');
            header("Location: $url");
            exit();
        }

    }

    public function edit($id)
    {
        $user = $this->user_model->findById($id);
        if (!$user){
            abort("Admin not found.");
        }
        View::render('admin.admins.edit',compact('user','id'),'default');
    }

    public function update(int $id ,Request $request)
    {
        $admin = $this->user_model->findById($id);
        if (!$admin){
            abort('Admin not found.');
        }

        $data = $request->toArray();
        $data['id'] = $id;
        $rules = [
            'id'=> 'required|integer|exists:users,id',
            'name' => 'required|min:3',
            'username' => 'required|min:6',
            'password' => 'required|min:6',
            'confirm_password' => 'required|confirm:password',
        ];
        if (!Validator::validate($data,$rules)){
            $redirect = url("/admin/admins/$id/edit/");
            header('Location:'. $redirect);
        }else{
            if($this->updateAdmin($data)){
                $redirect = url('/admin/home/');
                header("Location: $redirect");
                exit();
            }else{
                $redirect = url("/admin/admins/$id/edit/");

                header('Location:'. $redirect);
            }


        }

    }

    public function destroy( int $id)
    {
        $admin = $this->user_model->findById($id);
        if (!$admin){
            abort('Admin not found.');
        }
        $this->user_model->deleteById($id);
        $redirect = url('/admin/home/');
        flash(['message'=>'Admin Deleted Successfully!','class'=>'alert alert-success']);
        if ($id == Auth::user()['id']){
            Auth::logout();
        }
        header("Location: $redirect");
        exit();

    }
}