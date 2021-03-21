<?php
namespace App\Models;

use Core\Framework\BaseModel;

class User extends BaseModel
{
    protected $fillable = ['name','surname','password'];

   function insert($data)
   {

       $password= password_hash($data['password'],PASSWORD_DEFAULT);

       try {
           $sql =$this->connection->prepare("INSERT into users (name,username,password) VALUES (:name,:username,:password)");
           $sql->bindValue(":name", $data['name']);
           $sql->bindValue(":username", $data['username']);
           $sql->bindValue(":password", $password);
           $sql->execute();
       }catch (\PDOException $e){
           throw new \PDOException($e->getMessage());
       }
   }

   function getAllUsers()
   {
       $stmt = $this->connection->prepare("SELECT * FROM users");
       $stmt->execute();
       return $stmt->fetchAll();
   }

   function login($data)
   {
       $stmt = $this->connection->prepare("SELECT * FROM users WHERE username=?");
       $stmt->execute([$data['username']]);
       $user = $stmt->fetch();
       if ($user){
           if (password_verify($data['password'], $user['password'])){
               $_SESSION['user'] = $user;
               return true;
           }
       }
       flash(['message'=>'Username or password incorect','class'=>'alert alert-danger']);
       return false;
   }

   function findById($id)
   {
       $stmt = $this->connection->prepare("SELECT * FROM users WHERE id=?");
       $stmt->execute([$id]);
       $user = $stmt->fetch(\PDO::FETCH_ASSOC);

       return $user;

   }

   function find($k,$v)
   {
       $stmt = $this->connection->prepare("SELECT * FROM users WHERE $k=?");
       $stmt->execute([$v]);
       $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);


       return $user;
   }

   function updateById(int $id , array $update)
   {
       $stmt = $this->connection->prepare("UPDATE users SET `name` = ?,`username` = ?,`password`= ? WHERE `id`=?");
       $stmt->execute([$update['name'],$update['username'],password_hash($update['password'],PASSWORD_DEFAULT),$id]);
   }

    function deleteById( int $id)
    {
        $smtm = $this->connection->prepare("DELETE FROM users WHERE `id` = ?");
        $smtm->execute([$id]);
    }

}