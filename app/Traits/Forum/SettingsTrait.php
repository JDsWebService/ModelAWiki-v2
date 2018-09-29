<?php

namespace App\Traits\Forum;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait SettingsTrait {

    // Upload Image
	protected function uploadImage($request, $settings) {

		// Delete the Old User Profile Image
	    $this->deleteImage($settings->image);
	    
	    // Grab the file out of the request
	    $image = $request->file('image');

	    // Created a filename
	    $filename = time() . '.' . $image->getClientOriginalExtension();

	    // Save the Post Image
	        // Choose a location for the file
	        $location = public_path('images/forum/' . $filename);
	        // Create the Image, resize it, and save it to the path
	        Image::make($image)->fit(1280, 150)->save($location);

	    // Put path into the DB
	    return '/images/forum/' . $filename;
	}

	// Delete Image
	public function deleteImage($image) {
	    // Check to see if the user profile picture is not default placeholder
	    // This prevents deletion of the default placeholder image
	    if($image !== '/images/forum/placeholder.png') {
	        // Delete the old files
	        File::delete('images/forum/' . $image);
	    }
	}

}