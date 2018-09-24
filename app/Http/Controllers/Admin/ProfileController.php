<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Blog\Post;
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
        $this->middleware('auth:admin')
                                ->except('getPublicProfile');
    }
    
    // Get Admin Profile
    public function getProfile() {
    	$user = Auth::guard('admin')->user();

    	return view('admin.profile')
    							->withUser($user);
    }

    // Get Profile Settings Form
    public function getSettings() {
    	$user = Auth::guard('admin')->user();

    	return view('admin.settings')
    							->withUser($user);
    }

    // Save User Settings
    public function saveProfile(Request $request) {

    	$this->validate($request, [
    		'first_name' => 'required|max:50|string',
    		'last_name' => 'required|max:50|string',
    		'email' => 'required|max:255|email',
    		'image' => 'sometimes|image',
    	]);

    	$user = Auth::guard('admin')->user();

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->profile_image = $this->uploadImage($request, $user);

    	$user->save();

    	Session::flash('success', 'Save Profile Successfully!');

    	return redirect()->route('admin.profile.self');
    }

    // Get Public Profile
    public function getPublicProfile($admin) {
        $user = Admin::find($admin);
        $posts = Post::where('user_id', $admin)->paginate(5);

        return view('admin.publicProfile')
                                ->withUser($user)
                                ->withPosts($posts);
    }



}
