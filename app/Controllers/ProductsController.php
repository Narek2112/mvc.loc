<?php


namespace App\Controllers;


use Core\Framework\File;
use Core\Framework\Request;
use Core\Framework\Validator;
use Core\Framework\View;
use App\Middleware\AuthCheckMiddleware;
use App\Models\Product;

class ProductsController
{
    const UPLOAD_PATH = '/images';

    public function __construct()
    {
        new AuthCheckMiddleware();
        $this->products_model = new Product();
    }

    public function index()
    {
        $products = $this->products_model->all();

        View::render('admin.products.index',compact('products'),'default');

    }

    function create()
    {
        View::render('admin.products.create',[],'default');
    }

    public function store(Request $request)
    {
        $data = $request->toArray();

        $rules = [
            'name'  => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'required|file:png,jpg,jpeg',
        ];
        Validator::redirectTo(url('/admin/products/create'));
        if (Validator::validate($data,$rules)){
            $file = $request->get('image');
            $src = File::store($file,self::UPLOAD_PATH);
            if ($src){
                $this->products_model->insert(['name'=>$data['name'],'price'=>$data['price'],'src'=>$src]);
                $redirect = url('/admin/products');
                header("Location: $redirect");
            }
        }
    }

    public function edit($id)
    {
        $product = $this->products_model->findById($id);
        if (!$product){
            abort("Product not found.");
        }
        View::render('admin.products.edit',compact('product'),'default');
    }

    public function update($id,Request $request)
    {


        $product = $this->products_model->findById($id);

        if (!$product){
            abort("Product not found.");
        }

        if ($request->hasFile('image')){

            $rules['image'] = 'required|file:png,jpg,jpeg';
        }
        $rules['name'] =  'required|max:255';
        $rules['price'] = 'required|numeric';

        Validator::validate($request->toArray(),$rules);
        if ($request->hasFile('image')){
            $src = $product['src'];
            File::delete($src);
            $src = File::store($request->get('image'),self::UPLOAD_PATH);
        }
        $src = isset($src) ? $src : $product['src'];

        $this->products_model->updateById($id,['name'=>$request->get('name'),'price'=>$request->get('price'),'src'=>$src]);
        flash(['message'=>'Product Updated Successfully','class'=>'alert alert-success']);
        header("Location:".url('/admin/products'));
    }

    public function destroy($id)
    {
        $product = $this->products_model->findById($id);
        if (!$product){
            abort("Product not found.");
        }
        $src = $product['src'];
        File::delete($src);
        $this->products_model->deleteById($id);
        flash(['message'=>'Product deleted successfully','class'=>'alert alert-success']);
        header("Location:".url('/admin/products'));
    }



}