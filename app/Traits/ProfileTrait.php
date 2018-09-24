<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ProfileTrait {

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