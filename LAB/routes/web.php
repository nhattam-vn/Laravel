<?php

use Illuminate\Support\Facades\Route;


Route::get("/", 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get("/products","App\Http\Controllers\ProductController@index")->name("product.index");
Route::get("/products/{id}","App\Http\Controllers\ProductController@show")->name("product.show");
Route::middleware('admin')->group(function (){
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::get('/admin/products/delete', 'App\Http\Controllers\Admin\AdminProductController@trash')->name('admin.product.trash');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart','App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete','App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}','App\Http\Controllers\CartController@add')->name("cart.add");