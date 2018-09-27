<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\UserSocialLink;
use App\Traits\ProfileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    use ProfileTrait;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user')
                                ->except('getPublicProfile');
    }
    
    // Get the User Dashboard (/user/profile)
    public function getProfile() {
    	$user = Auth::guard('user')->user();
    	$socialLinks = UserSocialLink::where('user_id', $user->id)->get();

    	return view('user.profile.self')
    							->withUser($user)
                                ->withSocialLinks($socialLinks);
    }

    // Get Public Profile
    public function getPublicProfile($username) {
        $user = User::where('username', $username)->first();
        $socialLinks = UserSocialLink::where('admin_id', $user->id)->get();

        return view('user.profile.publicProfile')
                                ->withUser($user)
                                ->withSocialLinks($socialLinks);
    }

    // Get Profile Settings Form
    public function getSettings() {
    	$user = Auth::guard('user')->user();

    	return view('user.profile.settings')
    							->withUser($user);
    }

    // Save User Settings
    public function saveProfile(Request $request) {

        $user = Auth::guard('user')->user();

    	$this->validate($request, [
    		'first_name' => 'required|max:50|string',
    		'last_name' => 'required|max:50|string',
    		'email' => 'required|max:255|email',
            'username' => 'required|alpha_num|min:3|string|unique:users,username,' . $user->id,
    		'image' => 'sometimes|image',
    	]);

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
        $user->username = $request->username;
        if($request->hasFile('profile_image')) {
            $user->profile_image = $this->uploadImage($request, $user);
        }
    	
    	$user->save();

    	Session::flash('success', 'Save Profile Successfully!');

    	return redirect()->route('user.profile.self');
    }

}
