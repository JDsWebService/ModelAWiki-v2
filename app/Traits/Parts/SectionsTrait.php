<?php

namespace App\Traits\Parts;

use Str;
use File;
use Image;
use Session;

trait SectionsTrait {

	// Process Section Object
	public function processSectionObject($section, $request) {
	    $section->name = $request->name;
	    $section->slug = $this->generateSectionSlug($request->name);

	    // Upload the Image and Save the Filename to the section Object
	    // Check if the request has an image
	    if($request->hasFile('image')) {
	        if($request->isMethod('PUT')) {
	            $section->image = $this->uploadImage($request, $section);
	        } else {
	            $section->image = $this->uploadImage($request);
	        }
	    }
	}

	// Generate Slug
	public function generateSectionSlug($name) {
	    $trimedName = Str::limit($name, 85, '');
	    return $slug = Str::slug($trimedName, '-') . '-' . time();
	}

	// Upload Image
	protected function uploadImage($request, $section = NULL) {
	        
	    if($request->isMethod('PUT')) {
	        // Check to see if section_id is null
	        if($section == NULL) {
	            die('Section Object has not been passed.');
	        }

	        // Grab the old filename from the DB
	        $oldFilename = $section->image;

	        $this->deleteImages($oldFilename);
	    }
	    
	    // Grab the file out of the request
	    $image = $request->file('image');

	    // Created a filename
	    $filename = $this->generateSectionSlug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

	    // Save the sections Image Header
	        // Choose a location for the file
	        $location = public_path('images/sections/' . $filename);
	        // Create the Image, resize it, and save it to the path
	        Image::make($image)->fit(348,225)->save($location);

	    // Put path into the DB
	    return $filename;
	}

	// Delete Images
	public function deleteImages($filename) {
		// Check to see if the user profile picture is not default placeholder
		// This prevents deletion of the default placeholder image
		if($filename !== 'placeholder.png') {
		    // Delete the old files
		    File::delete('images/sections/' . $filename);
		}
	}


}