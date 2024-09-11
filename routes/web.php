<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


route::controller(ProductController::class)->group(function(){
route::get('/products','index')->name('products.index');
route::get('/products/create','create')->name('products.create');
route::post('/products/store','store')->name('products.stores');
route::get('/products/{products}/edit','edit')->name('products.edit');
route::put('/products/{product}','update')->name('products.update');
route::get('/products/{product}','destroy')->name('products.destroy');
});