<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('id', 'asc')->paginate(5);
        return view('post.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');

        return view('post.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'id_category' => 'required',
        ]);

        $requestAll = $request->all();
        $requestAll['image'] = $this->uploadFile($request);            

        Post::create($requestAll);

        return redirect()->route('posts.index')
            ->with('success','Post created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show',compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id');

        return view('post.edit', compact('post', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title' => 'required',            
            'content' => 'required',            
            'id_category' => 'required',                        
        ]);

        $requestAll = $request->all();
        $requestAll['image'] = $this->uploadFile($request);

        if ($requestAll['image'] == '') {
            unset($requestAll['image']);
        }        

        Post::find($id)->update($requestAll);    

        return redirect()->route('posts.index')
           ->with('success','Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }	

    /**
    * Uploading an image
    *
    * @param  \Illuminate\Http\Request  $request
    */
    private function uploadFile(Request $request){
        $file = $request->file('image');

        if ($file) {
            $destinationPath = 'upload';
            $name = md5(microtime() . rand(0, 9999)).'_'.$file->getClientOriginalName();

            $file->move($destinationPath, $name);

            return $name;
        }        

        return '';
    }    
}
