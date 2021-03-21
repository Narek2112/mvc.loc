<?php
use Core\Framework\Router;

Router::get('/','HomeController@index');
Router::get('/asd','HomeController@qwe');


Router::get('/admin/login','LoginController@index');
Router::post('/admin/login','LoginController@login');
Router::post('/logout','LoginController@logout');


Router::get('/admin/home','AdminController');
/*Admin Routes*/
Router::get('/admin/admins/create','AdminController@create');
Router::post('/admin/admins/store','AdminController@store');
Router::get('/admin/admins/{id}/edit/','AdminController@edit');
Router::post('/admin/admins/{id}/update/','AdminController@update');
Router::post('/admin/admins/{id}/delete/','AdminController@destroy');
/*Products*/
Router::get('/admin/products','ProductsController');
Router::get('/admin/products/create','ProductsController@create');
Router::post('/admin/products/store','ProductsController@store');
Router::get('/admin/products/{id}/edit','ProductsController@edit');
Router::post('/admin/products/{id}/update','ProductsController@update');
Router::post('/admin/products/{id}/delete','ProductsController@destroy');
/*Orders*/
Router::get('/admin/orders','OrdersController');
Router::get('/admin/orders/{id}/show','OrdersController@show');
Router::post('/admin/orders/{id}/delete','OrdersController@destroy');
//
//Router::get('/admin/products','ProductsController');
//Router::get('/admin/products','ProductsController');



