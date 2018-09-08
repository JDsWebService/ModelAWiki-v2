<?php

namespace App\Http\Controllers\Blog;

use Session;
use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use App\Models\Blog\Category;
use App\Traits\Blog\TagsTrait;
use App\Traits\Blog\PostsTrait;
use App\Traits\Blog\CategoriesTrait;
use App\Http\Requests\Blog\PostRequest;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    use PostsTrait;
    use CategoriesTrait;
    use TagsTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Grab all the posts from the database
        $posts = Post::select('id', 'title', 'created_at', 'published_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Authorization
        $this->authorize('post.create');

        $categories = Category::all();

        if($this->checkIfCategoriesExist($categories)) {
            return redirect()->route('category.index');
        }

        $tags = Tag::all();
        
        return view('post.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http|Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Check Authorization
        $this->authorize('post.create');
        
        // Get a new post object
        $post = new Post;

        // Process the Post Object
        $this->processPostObject($post, $request);

        // Save the post to the database
        $post->save();

        // Process the Tags
        $post->tags()->sync($request->tags, false);

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
        // Check Authorization
        $this->authorize('post.view');

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
        // Check Authorization
        $this->authorize('post.edit');

        $post = Post::find($id);

        $categories = Category::all();

        if($this->checkIfCategoriesExist($categories)) {
            return redirect()->route('category.index');
        }

        $tags = Tag::all();

        $tags = $this->getTagsArray($tags);

        return view('post.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        // Check Authorization
        $this->authorize('post.update');

        // Get a new post object
        $post = Post::find($id);

        // Process the Post Object
        $this->processPostObject($post, $request);

        // Save the post to the database
        $post->save();

        // Sync Tags
        $post->tags()->sync($request->tags);

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
        // Check Authorization
        $this->authorize('post.delete');

        $post = Post::find($id);

        $post->tags()->detach();

        $this->deleteImage($post->image);

        $post->delete();

        Session::flash('success', 'Post has been deleted');

        return redirect()->route('post.index');
    }

    





}
