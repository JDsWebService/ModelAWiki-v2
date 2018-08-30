<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth:user');
	}
	
    // Get the User Dashboard (/user/dashboard)
    public function getDashboard() {
    	return view('user.dashboard');
    }
}
