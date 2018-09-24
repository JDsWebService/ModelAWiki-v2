<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
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

    	return redirect()->route('admin.profile');
    }

    // Upload Image
    protected function uploadImage($request, $user) {

    	// Delete the Old User Profile Image
        $this->deleteImage($user->profile_image);
        
        // Grab the file out of the request
        $image = $request->file('profile_image');

        // Created a filename
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // Save the Post Image
            // Choose a location for the file
            $location = public_path('images/users/' . $filename);
            // Create the Image, resize it, and save it to the path
            Image::make($image)->fit(200,200)->save($location);

        // Put path into the DB
        return '/images/users/' . $filename;
    }

    // Delete Image
    public function deleteImage($image) {
        // Check to see if the user profile picture is not default placeholder
        // This prevents deletion of the default placeholder image
        if($image !== '/images/users/placeholder.png') {
            // Delete the old files
            File::delete('images/users/' . $image);
        }
    }



}
