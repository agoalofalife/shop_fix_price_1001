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
        Route::post('admin/category/store','CategoryController@store');
        Route::get('admin/category','CategoryController@index');
        Route::get('/admin', 'AdminController@index');
        Route::get('admin/products/destroy/image/{id}','ProductsController@destroy_image');
        Route::get('admin/products/destroy/{id}','ProductsController@destroy');

        Route::post('admin/products/store/{id}','ProductsController@store');

        Route::get('/admin/products/create/choice','ProductsController@choice');
        Route::get('/admin/products/create/{id}','ProductsController@create');
        Route::get('admin/products/edit/{id}','ProductsController@edit');
        Route::patch('admin/products/{id}','ProductsController@update');
        Route::post('/admin/products/filter', 'ProductsController@filter');
        Route::get('/admin/products', 'ProductsController@index');

    });
    Route::get('/cart/add/{id}','CartController@add');
    Route::resource('cart','CartController');
    Route::get('category/{id}','CategoryController@show');
    Route::get('product/{id}','ProductsController@show');

});

Route::get('/test',function(){
return \App\Products::with('category')->first();

});


