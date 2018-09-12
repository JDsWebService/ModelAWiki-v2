<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    // Get Index
    public function index() {
    	$posts = Post::whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(2);
    	
    	return view('blog.index')->withPosts($posts);
    }
}
