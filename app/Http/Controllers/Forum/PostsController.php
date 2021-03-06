<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\ForumPost;
use App\Models\Forum\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class PostsController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('forum');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|max:255|min:10|string',
    		'body' => 'required|max:40000|min:10|string',
    		'category_id' => 'required|integer'
    	]);

    	$post = new ForumPost;

    	$post->title = Purifier::clean($request->title);
    	$post->body = Purifier::clean($request->body);
    	$post->category_id = $request->category_id;

        if(Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            $post->admin_id = $admin->id;
        } else {
            $user = Auth::guard('user')->user();
            $post->user_id = $user->id;
        }
    	
    	$post->slug = str_slug($request->title) . '-' . time();

    	$post->save();

    	Session::flash('success', 'Created The Forum Post Successfully!');

    	return redirect()->route('forum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = ForumPost::where('slug', $slug)->first();
        $replies = ForumReply::where('post_id', $post->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('forum.post.show')
        						->withPost($post)
                                ->withReplies($replies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
        	'title' => 'required|max:255|min:10|string',
        	'body' => 'required|max:40000|min:10|string',
        	'category_id' => 'required|integer'
        ]);

        $post = ForumPost::where('slug', $slug)->first();

        if(Auth::guard('user')->user()->id = $post->user_id or Auth::guard('admin')->check()) {
        	$post->title = Purifier::clean($request->title);
        	$post->body = Purifier::clean($request->body);
        	$post->category_id = $request->category_id;

        	$post->save();

        	Session::flash('success', 'Edited The Forum Post Successfully!');

        	return redirect()->route('forum.post.show', $post->slug);
        }

        Session::flash('danger', 'You do not have permission to edit this forum post!');

        return redirect()->route('forum.post.show', $post->slug);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = ForumPost::where('slug', $slug)->first();

        if(Auth::guard('user')->user()->id === $post->user_id or Auth::guard('admin')->check()) {
        	$post->delete();

        	Session::flash('success', 'Deleted The Forum Post Successfully!');

        	return redirect()->route('forum.index');
        }

        Session::flash('danger', 'You do not have permission to delete this forum post!');

        return redirect()->route('forum.post.show', $post->slug);

    }
}
