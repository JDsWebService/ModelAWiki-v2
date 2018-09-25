<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function getProfile() {
    	$user = Auth::guard('user')->user();

    	return view('user.profile')
    							->withUser($user);
    }
}
