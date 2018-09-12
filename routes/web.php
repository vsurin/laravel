<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category','CategoryController');
Route::resource('posts','PostController');

Route::get('api/posts/{id}','ApiController@index');
Route::get('api/post/show/{post}','ApiController@show');
Route::get('api/post/count','ApiController@count');