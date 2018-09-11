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
        ->select('post.id', 'post.content', 'post.title', 'category.title as c_title')
        ->join('category', 'category.id', '=', 'post.id_category')
        ->offset($offest)
        ->limit(2)
        ->get();

	return response()->json(['posts' => $posts]); 
});
Route::get('api/count/posts/', function () {
    return response()->json(['count' => App\Post::count()]);
});
Route::get('api/post/{id}', function ($id = 0) {
    $post = \App\Post::find($id);

    return response()->json(['post' => $post]);
});