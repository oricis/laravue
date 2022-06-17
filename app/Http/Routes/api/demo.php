<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('api')
    ->prefix('v1')
    ->group(function () {

    Route::namespace('Shop\Catalog\Products')
        ->group(function () {

        Route::get('products', 'ProductController@index')
            ->name('api.products.index');

        Route::get('products/{id}', 'ProductController@find')
            ->name('api.products.find');

            // ->where('id', '[0-9]+'); // on RouteServiceProvider globally
            // ->whereNumber('id'); // Laravel 8+;

        Route::post('products', 'ProductController@store')
            ->name('api.products.store');

        Route::destroy('products/{id}', 'ProductController@destroy')
            ->name('api.products.destroy');
    });
});
