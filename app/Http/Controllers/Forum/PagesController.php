<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
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
    	return view('forum.index');
    }

    // Get Forum Discussion Post
    public function discussion() {
    	return "test";
    }
}
