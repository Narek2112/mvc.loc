<?php


namespace App\Helpers;


trait AdminHelper
{
    public function updateAdmin($updateData)
    {
        $currentUser = $_SESSION['user'];
        $user = $this->user_model->find('username',$updateData['username'])[0];

        if ($user && $user['id'] != $updateData['id']){
            flash(['message'=>'Username already taken','class'=>'alert alert-danger']);
            return false;
        }

        if (!$user){
            $user = $this->user_model->findById($updateData['id']);
        }

        if (!password_verify($updateData['current_password'],$currentUser['password'])){
            flash(['message'=>'Current password not correct!','class'=>'alert alert-danger']);
            return false;
        }

        $this->user_model->updateById($updateData['id'],$updateData);
        flash(['message'=>'Admin Updated Successfully!','class'=>'alert alert-success']);

        return true;


    }
}