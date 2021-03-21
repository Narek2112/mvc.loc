<?php


namespace App\Models;


use Core\Framework\BaseModel;

class Product extends BaseModel
{
    protected $table = 'products';

    public  function all()
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert($data)
    {
        try {
            $sql =$this->connection->prepare("INSERT into $this->table (name,price,src) VALUES (:name,:price,:src)");
            $sql->bindValue(":name", $data['name']);
            $sql->bindValue(":price", $data['price']);
            $sql->bindValue(":src", $data['src']);
            $x = $sql->execute();
        }catch (\PDOException $e){
            throw new \PDOException($e->getMessage());
        }
    }

    function findById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    function updateById(int $id , array $update)
    {
        $stmt = $this->connection->prepare("UPDATE $this->table SET `name` = ?,`price` = ?,`src`= ? WHERE `id`=?");
        $stmt->execute([$update['name'],$update['price'],$update['src'],$id]);
    }


    function deleteById( int $id)
    {
        $smtm = $this->connection->prepare("DELETE FROM $this->table WHERE `id` = ?");
        $smtm->execute([$id]);
    }
}