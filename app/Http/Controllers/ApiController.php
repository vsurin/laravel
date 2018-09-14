<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Post;

class ApiController extends Controller
{
    /**
     * Вывод постов
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $limit, int $offset)
    {
        $offset = $limit * ($offset - 1);

        $posts = DB::table('post')
            ->select('post.id', 'post.content', 'post.title', 'post.image', 'category.title as c_title')
            ->join('category', 'category.id', '=', 'post.id_category')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return response()->json(['posts' => $posts]);
    }

    /**
     * Возврашает json поста
     *
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        return response()->json(['post' => $post]);
    }

    /**
     * Возврашает количество постов в формате json
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function count()
    {
        return response()->json(['count' => Post::count()]);
    }
}