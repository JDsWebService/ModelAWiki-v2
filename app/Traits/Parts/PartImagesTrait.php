<?php

namespace App\Traits\Parts;

use File;
use Image;

trait PartImagesTrait {

    // Upload Image
    protected function uploadImage($request, $part) {
        
        // Grab the file out of the request
        $image = $request->file('image');

        // Created a filename
        $filename = $part->part_number . '-' . time() . '.' . $image->getClientOriginalExtension();

        // Save the Parts Image Thumbnail
            // Choose a location for the file
            $location = public_path('images/parts/thumbnails/' . $filename);
            // Create the Image, resize it, and save it to the path
            Image::make($image)->fit(75,75)->save($location);

        // Save the Original
            // Choose a location for the file
            $location = public_path('images/parts/originals/' . $filename);
            // Create the Image, resize it, and save it to the path
            Image::make($image)->save($location);

        // Put path into the DB
        return $filename;
    }

    // Delete Images
    public function deleteImages($filename) {
	    // Delete the old files
	    File::delete('images/parts/thumbnails/' . $filename);
	    File::delete('images/parts/originals/' . $filename);
    }

}