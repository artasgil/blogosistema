<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Kyslik\CollumnSortable\Sortable;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $posts = post::All();
        $categories = Category::all();
        $category_id = $request->category_id;

        // $posts = Post::sortable()->paginate(15);

        if(!$category_id){
            $category_id='all';
        }

        if($category_id!='all') {
            $posts = Post::sortable()->where('category_id', $category_id)->paginate(15);
        } else {
            $posts = Post::sortable()->paginate(15);
        }

        return view ('post.index', ['posts' => $posts, 'categories' => $categories, 'category_id' => $category_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::All();
        return view ('post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryNew = $request->categoryNew;

        if($categoryNew == "1") {
            $category = new Category;
            $category->title = $request->category_title;
            $category->excertpt = $request->category_excertpt;
            $category->email = $request->category_email;
            $category->save();

            $category_id = $category->id;
        } else {
            $category_id = $request->postCategory;
        }


        $post = new Post;

        $post->title = $request->post_title;
        $post->excertpt = $request->post_excertpt;
        $post->description = $request->post_description;
        $post->category_id = $category_id;

        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', ['categories' => $categories, 'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $post->title = $request->post_title;
        $post->excertpt = $request->post_excertpt;
        $post->description = $request->post_description;
        $post->category_id = $request->category_id;

        $post->save();
        return redirect()->route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {


        $post->delete();

        $success = [
            "success" => "The Post deleted successfuly",
        ];
        $success_json = response()->json($success);

        return $success_json;
    }

    public function destroyAjax(Post $post)
    {

        $category_id = $post->category_id;

        $post->delete();

        $postsLeft = Post::where('category_id', $category_id)->get();
        $postsCount = $postsLeft->count();


        $success = [
            "success" => "The Post deleted successfuly, posts left: ".$postsCount,
            "postsCount" => $postsCount
        ];
        $success_json = response()->json($success);

        return $success_json;
    }
}
