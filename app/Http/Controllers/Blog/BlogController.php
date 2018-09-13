<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Get Index
    public function index() {
    	$posts = Post::whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(4);
    	
    	return view('blog.index')->withPosts($posts);
    }

    // Get Post
    public function post($slug) {
    	$post = Post::where('slug', $slug)->first();

    	return view('blog.post')->withPost($post);
    }

    // Get Category
    public function category($slug) {
    	$posts = Category::where('slug', $slug)->first()->posts()->paginate(4);
    	$category = Category::where('slug', $slug)->first();

    	return view('blog.category')
    				->withPosts($posts)
    				->withCategory($category);
    }
}
