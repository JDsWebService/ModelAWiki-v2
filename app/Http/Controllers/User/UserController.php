<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSocialLink;
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
	
    // Get the User Dashboard (/user/profile)
    public function getProfile() {
    	$user = Auth::guard('user')->user();
    	$socialLinks = UserSocialLink::where('user_id', $user->id)->get();

    	return view('user.profile.public')
    							->withUser($user)
                                ->withSocialLinks($socialLinks);
    }
}
