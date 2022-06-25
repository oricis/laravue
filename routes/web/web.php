<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'web\Shop\Catalog\Products\ProductsController@index')->name('welcome');

Route::namespace('web\Shop\Catalog')
    ->prefix('shop/catalog')
    ->group(function () {

    Route::namespace('Products')
        ->group(function () {

        Route::get('products', 'ProductsController@index')
            ->name('web.products.index');
        Route::get('products/create', 'ProductsController@create')
            ->name('web.products.create');
        Route::post('products/store', 'ProductsController@store')
            ->name('web.products.store');
        Route::delete('products/destroy', 'ProductsController@destroy')
            ->name('web.products.destroy');
    });
});
