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
    Route::resource('category','CategoryController@index');


});

Route::get('/test',function(){
return \App\Drinks::with('category')->first();
});
Route::group(['middleware' => 'auth'], function () {
//    Route::get('/home', 'HomeController@index');


});
