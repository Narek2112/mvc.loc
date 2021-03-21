<?php
namespace App\Controllers;

use Core\Framework\View;
use App\Middleware\AuthCheckMiddleware;
use App\Models\Order;

class OrdersController
{
    public function __construct()
    {
        new AuthCheckMiddleware();
        $this->order_model = new Order();
    }

    public function index()
    {
        $orders = $this->order_model->all();
        View::render('admin.orders.index',compact('orders'),'default');
    }

    public function show($id)
    {
        $order = $this->order_model->findById($id);
        if (!$order){
            abort("Order not found.");
        }
        $order['products'] = $this->order_model->getOrderDetails($id);
        View::render('admin.orders.show',compact('order'),'default');
    }

    public function destroy($id)
    {
        $product = $this->order_model->findById($id);
        if (!$product){
            abort("Product not found.");
        }
        $this->order_model->deleteById($id);
        flash(['message'=>'Order deleted successfully','class'=>'alert alert-success']);
        header("Location:".url('/admin/orders'));
    }
}