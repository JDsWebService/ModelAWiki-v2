<?php

namespace App\Traits\Parts;

use Str;
use File;
use Image;
use Purifier;

trait PartsTrait {

	// Process the Part Object using Information From the Request
	protected function processPartObject($part, $request) {
	    // Put all values from the request into the part object
	    $part->section_id = $request->section_id;
	    $part->name = Purifier::clean($request->name);
	    $part->part_number = Purifier::clean($request->part_number);
	    $part->description = Purifier::clean($request->description);
	    $part->body_type = Purifier::clean($request->body_type);
	    $part->year = $request->year;
	    $part->reminder = Purifier::clean($request->reminder);
	    $part->tip = Purifier::clean($request->tip);
	    $part->warning = Purifier::clean($request->warning);
	    $part->fun_fact = Purifier::clean($request->fun_fact);
	    $part->slug = $this->generatePartSlug($part->name, $part->part_number);

	    // Convert Date Time from request
	    $date_start = $this->convertStringToDate($request->date_start_month, $request->date_start_year);
	    $date_end = $this->convertStringToDate($request->date_end_month, $request->date_end_year);
	    $part->date_start = $date_start;
	    $part->date_end = $date_end;

	    // Upload the Image and Save the Filename to the Part Object
	    // Check if the request has an image
	    if($request->hasFile('featured_image')) {
	        if($request->isMethod('PUT')) {
	            $part->featured_image = $this->uploadImage($request, $part);
	        } else {
	            $part->featured_image = $this->uploadImage($request);
	        }
	    }
	}

	// Generate Slug
	public function generatePartSlug($name, $part_number) {
	    $trimedName = Str::limit($name, 85, '');
	    return $slug = Str::slug($trimedName, '-') . '-' . $part_number;
	}

	// Convert Date from string to date
	protected function convertStringToDate($month, $year) {
	    // Put the Date into variable as string
	    $date = $year . "-" . $month . "-01";
	
	    return $date;
	}

	// Upload Image
	protected function uploadImage($request, $part = NULL) {
	        
	    if($request->isMethod('PUT')) {
	        // Check to see if part_id is null
	        if($part == NULL) {
	            die('Part Object has not been passed.');
	        }

	        // Grab the old filename from the DB
	        $oldFilename = $part->featured_image;

	        $this->deleteImages($oldFilename);
	    }
	    
	    // Grab the file out of the request
	    $image = $request->file('featured_image');

	    // Created a filename
	    $filename = $request->part_number . '-' . time() . '.' . $image->getClientOriginalExtension();

	    // Save the Parts Image Header
	        // Choose a location for the file
	        $location = public_path('images/parts/headers/' . $filename);
	        // Create the Image, resize it, and save it to the path
	        Image::make($image)->fit(1080,350)->save($location);

	    // Save the Parts Image Thumbnail
	        // Choose a location for the file
	        $location = public_path('images/parts/thumbnails/' . $filename);
	        // Create the Image, resize it, and save it to the path
	        Image::make($image)->fit(150,150)->save($location);

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
		// Check to see if the user profile picture is not default placeholder
		// This prevents deletion of the default placeholder image
		if($filename !== 'placeholder.png') {
		    // Delete the old files
		    File::delete('images/parts/headers/' . $filename);
		    File::delete('images/parts/thumbnails/' . $filename);
		    File::delete('images/parts/originals/' . $filename);
		}
	}

	// Get the Month
	protected function getMonth($date) {
	    // Grab the Date and convert it into a usable number
	    $month = date("n", strtotime($date));
	    
	    // return the month
	    return $month;
	}

	// Get the Year
	protected function getYear($date) {
	    // Grab the Date and convert it into a usable number
	    $year = date("Y", strtotime($date));
	    
	    // return the year
	    return $year;
	}

	


}