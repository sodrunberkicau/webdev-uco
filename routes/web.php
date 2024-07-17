<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('catalog');
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart', 'App \ Http \ Controllers \ CartController@index')->name("cart.index");
//Route::get('/cart/delete', 'App \ Http \ Controllers \ CartController@delete')->name("cart.delete");
//Route::post('/cart/add/{id}', 'App \ Http \ Controllers \ CartController@add')->name("cart.add");

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get('/cart/delete', [\App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/add/{id}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::controller(\App\Http\Controllers\ProductController::class)->group(function() {

        Route::match(['get', 'post'], '/product/create', 'create')
        //->can('create_product', App\Models\Product::class)
        ->name('product-create');
        Route::match(['get', 'post'], '/product/{id}/edit', 'edit')->name('product-edit');
    
    });

Auth::routes();
