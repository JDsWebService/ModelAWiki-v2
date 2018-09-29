<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\ForumCategory;
use App\Models\Forum\ForumPost;
use Illuminate\Http\Request;

class PagesController extends Controller
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

    // Get the Forum Index
    public function index() {
        $posts = ForumPost::orderBy('created_at', 'desc')->paginate(5);

    	return view('forum.index')
                                ->withPosts($posts);
    }

    // Get a specific category
    public function category($slug) {
    	$category = ForumCategory::where('slug', $slug)->first();
        $posts = ForumPost::where('category_id', $category->id)->paginate(5);

    	return view('forum.index')
    							->withPosts($posts);
    }
}
