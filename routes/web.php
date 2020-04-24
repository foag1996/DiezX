<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


Route::get('post/{post}', 'PostController@show')->name('posts.view');
Route::get('posts', 'PostController@index')->name('posts.index');


Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('comments', 'CommentController', ['except' => 'show', 'index']);
Route::resource('posts', 'PostController', ['except' => 'show','index']);
//Route::get('posts/create', 'PostController@create')->name('posts.create');


});
