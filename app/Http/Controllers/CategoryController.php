<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::sortable()->get();


        return view('category.index', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();

        return view ('category.create', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postNew = $request->postNew; //checkbox Add Clients?
        $category = new Category;
        $category->title = $request->category_title;
        $category->excertpt = $request->category_excertpt;
        $category->email = $request->category_email;

        $category->save();

        $postsInputCount = count($request->post_title);

        if($postNew == "1") {

            for($i = 0 ; $i < $postsInputCount ; $i++) {
                $post = new Post;
                $post->title = $request->post_title[$i];
                $post->excertpt = $request->post_excertpt[$i];
                $post->description = $request->post_description[$i];
                $post->category_id = $category->id;
                $post->save();
            }
        }
        return redirect()->route("category.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->categoryPosts;
        $postsCount = $posts->count();
        return view("category.show", ['category' => $category, 'posts' => $posts, 'postsCount' => $postsCount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
