<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use File;
use Image;
use Session;
use Purifier;
use Carbon\Carbon;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
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
        return view('post.create');
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

        return view('post.edit')->withPost($post);
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

    public function getPublishedAtDate($status) {
        if($status) {
            return Carbon::now()->toDateTimeString();
        } else {
            return null;
        }
    }

    // Upload Image
    protected function uploadImage($request, $post = NULL) {
            
        if($request->isMethod('PUT')) {
            // Check to see if part_id is null
            if($post == NULL) {
                die('Post Object has not been passed.');
            }

            $this->deleteImage($post->image);
        }
        
        // Grab the file out of the request
        $image = $request->file('image');

        // Created a filename
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // Save the Post Image
            // Choose a location for the file
            $location = public_path('images/posts/' . $filename);
            // Create the Image, resize it, and save it to the path
            Image::make($image)->fit(1600,250)->save($location);

        // Put path into the DB
        return $filename;
    }

    // Delete Image
    public function deleteImage($image) {
        // Check to see if the user profile picture is not default placeholder
        // This prevents deletion of the default placeholder image
        if($image !== 'placeholder.png') {
            // Delete the old files
            File::delete('images/posts/' . $image);
        }
    }

    // Process Post Object
    public function processPostObject($post, $request) {
        // Store all the data in the object
        $post->title = Purifier::clean($request->title);
        $post->subtitle = Purifier::clean($request->subtitle);
        $post->body = Purifier::clean($request->body);
        $post->slug = Str::slug($request->title, '-') . '-' . time();
        $post->user_id = Auth::user()->id;
        $post->published_at = $this->getPublishedAtDate($request->status);

        // Upload the Image and Save the Filename to the Part Object
        // Check if the request has an image
        if($request->hasFile('image')) {
            if($request->isMethod('PUT')) {
                $post->image = $this->uploadImage($request, $post);
            } else {
                $post->image = $this->uploadImage($request);
            }
        }
    }







}
