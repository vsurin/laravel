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

Route::get('api/posts/{id}', function ($id = 1) {
    $offest = ($id - 1) * 2;

	$posts = DB::table('post')
        ->offset($offest)
        ->limit(2)
        ->get();

	return response()->json(['posts' => $posts]); 
});
Route::get('api/count/posts/', function () {
    return response()->json(['count' => App\Post::count()]);
});
Route::get('api/posts/{post}', function (App\Post $post) {
    return response()->json(['posts' => $post]); 
});