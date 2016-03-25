<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');


    Route::group(['middleware' => 'auth'], function () {
        Route::get('admin/category/destroy/{id}','CategoryController@destroy');
        Route::patch('admin/category/{id}','CategoryController@update');
        Route::get('admin/category/edit/{id}','CategoryController@edit');
        Route::post('admin/category/create','CategoryController@store');
        Route::get('admin/category','CategoryController@index');
        Route::get('/admin', 'AdminController@index');
        Route::get('admin/products/edit/{id}','ProductsController@edit');
        Route::post('/admin/products/filter', 'ProductsController@filter');
        Route::get('/admin/products', 'ProductsController@index');
    });

    Route::get('category/{id}','CategoryController@show');

});

Route::get('/test',function(){
return \App\Products::with('category')->first();

});


