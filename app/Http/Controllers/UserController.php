<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    // Get the User Dashboard (/user/dashboard)
    public function getDashboard() {
    	return view('user.dashboard');
    }
}
