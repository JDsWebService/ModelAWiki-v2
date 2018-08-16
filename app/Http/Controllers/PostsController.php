<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Post;
use App\Models\Category;
use App\Traits\PostsTrait;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    use PostsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Grab all the posts from the database
        $posts = Post::select('id', 'title', 'created_at', 'published_at')->orderBy('published_at', 'created_at')->paginate(10);

        return view('post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $this->checkCategories($categories);

        $categories = $this->getCategoriesArray($categories);
        
        return view('post.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http|Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Get a new post object
        $post = new Post;

        // Process the Post Object
        $this->processPostObject($post, $request);

        // Save the post to the database
        $post->save();

        // Flash the Session Message
        Session::flash('success', 'Saved the post successfully!');

        return redirect()->route('post.index');

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

        return view('post.show')->withPost($post);
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

        $categories = Category::all();

        $this->checkCategories($categories);

        $categories = $this->getCategoriesArray($categories);

        return view('post.edit')->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http|Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // Get a new post object
        $post = Post::find($id);

        // Process the Post Object
        $this->processPostObject($post, $request);

        // Save the post to the database
        $post->save();

        // Flash the Session Message
        Session::flash('success', 'Saved the post successfully!');

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $this->deleteImage($post->image);

        $post->delete();

        Session::flash('success', 'Post has been deleted');

        return redirect()->route('post.index');
    }

    





}
