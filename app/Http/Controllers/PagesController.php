<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Get the Index Page (/)
    public function getIndex() {
    	return view('pages.index');
    }
}
