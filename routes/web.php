<?php
Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    return Redirect::to('/login');
});

Auth::routes();
Route::get('/about', function () {
    return view('posts.about');
});

Route::resource('post', 'PostController');

Route::get('/', function () {
    return Redirect::route('login');
});

Route::get('/home', 'HomeController@index');
