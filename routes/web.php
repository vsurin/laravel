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

Route::get('api/posts/', function () {
	$posts = App\Post::all();
	return response()->json(['posts' => $posts]); 
});
Route::get('api/posts/{post}', function (App\Post $post) {
    return response()->json(['posts' => $post]); 
});