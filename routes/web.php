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
/*
Route::get('/adminpage',function(){
    return view('posts.adminpage');
});*/
Route::get('/about', function () {
    return view('posts.about');
});
/*Route::post('post', function () {
    return 'you have searched' . Input::All();
});*/
Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);

Route::get('/', function () {
    return Redirect::route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
/*Route::get('/home', function () {
    return Redirect::route('login');
});*/