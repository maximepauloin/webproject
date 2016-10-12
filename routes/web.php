<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Routetest
Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);
Route::get('/', function () {
    return Redirect::route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
/*Route::get('/home', function () {
    return Redirect::route('login');
});*/