<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Get Index
    public function index() {
    	$posts = Post::whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(5);

    	return view('blog.index')->withPosts($posts);
    }
}
