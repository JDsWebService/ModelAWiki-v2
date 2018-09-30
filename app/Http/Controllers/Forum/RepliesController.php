<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\ForumPost;
use App\Models\Forum\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class RepliesController extends Controller
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
     * @param  string $postSlug
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postSlug)
    {
        $this->validate($request, [
            'body' => 'required|max:40000|min:10|string',
        ]);

        $user = Auth::guard('user')->user();
        $post = ForumPost::where('slug', $postSlug)->first();

        $reply = new ForumReply;

        $reply->body = Purifier::clean($request->body);
        $reply->post_id = $post->id;
        $reply->user_id = $user->id;
        $reply->slug = $post->id . '-' . time();

        $reply->save();

        Session::flash('success', 'Stored Your Reply Successfully!');

        return redirect()->route('forum.post.show', $post->slug);
    }

    /**
     * Show the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $replySlug
     * @return \Illuminate\Http\Response
     */
    public function show($replySlug) {
        $reply = ForumReply::where('slug', $replySlug)->first();

        return view('forum.reply.show')
                                ->withReply($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $replySlug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $replySlug)
    {
        $this->validate($request, [
            'body' => 'required|max:40000|min:10|string',
        ]);

        $user = Auth::guard('user')->user();
        $reply = ForumReply::where('slug', $replySlug)->first();

        if($user->id === $reply->post->user_id or Auth::guard('admin')->check()) {

            $reply->body = Purifier::clean($request->body);

            $reply->save();

            Session::flash('success', 'Saved Your Reply Successfully!');

            return redirect()->route('forum.post.show', $reply->post->slug);
        }

        Session::flash('danger', 'You do not have permission to edit this forum post!');

        return redirect()->route('forum.post.show', $reply->post->slug);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $replySlug
     * @return \Illuminate\Http\Response
     */
    public function destroy($replySlug)
    {
        $reply = ForumReply::where('slug', $replySlug)->first();

        if(Auth::guard('user')->user()->id === $reply->user_id or Auth::guard('admin')->check()) {
            $postSlug = $reply->post->slug;

            $reply->delete();

            Session::flash('success', 'Deleted The Forum Reply Successfully!');

            return redirect()->route('forum.post.show', $postSlug);
        }

        Session::flash('danger', 'You do not have permission to delete this forum post!');

        return redirect()->route('forum.post.show', $reply->post->slug);

    }
}
