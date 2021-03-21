<?php

namespace App\Models;

use Core\Framework\BaseModel;

class Order extends BaseModel
{
    protected $table = 'orders';

    public  function all()
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getOrderDetails($id)
    {
        $stmt = $this->connection->prepare("
            SELECT order_products.order_id,products.*    FROM order_products
            JOIN products
            ON order_products.product_id = products.id
            WHERE order_products.order_id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    function deleteById( int $id)
    {
        $smtm = $this->connection->prepare("DELETE FROM $this->table WHERE `id` = ?");
        $smtm->execute([$id]);
    }

}