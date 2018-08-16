<?php

namespace App\Traits;

use Str;
use Auth;
use File;
use Image;
use Session;
use Purifier;
use Carbon\Carbon;

trait PostsTrait {

	public function getPublishedAtDate($status) {
	        if($status) {
	            return Carbon::now()->toDateTimeString();
	        } else {
	            return null;
	        }
	    }

	    // Upload Image
	    protected function uploadImage($request, $post = NULL) {
	            
	        if($request->isMethod('PUT')) {
	            // Check to see if part_id is null
	            if($post == NULL) {
	                die('Post Object has not been passed.');
	            }

	            $this->deleteImage($post->image);
	        }
	        
	        // Grab the file out of the request
	        $image = $request->file('image');

	        // Created a filename
	        $filename = time() . '.' . $image->getClientOriginalExtension();

	        // Save the Post Image
	            // Choose a location for the file
	            $location = public_path('images/posts/' . $filename);
	            // Create the Image, resize it, and save it to the path
	            Image::make($image)->fit(1600,250)->save($location);

	        // Put path into the DB
	        return $filename;
	    }

	    // Delete Image
	    public function deleteImage($image) {
	        // Check to see if the user profile picture is not default placeholder
	        // This prevents deletion of the default placeholder image
	        if($image !== 'placeholder.png') {
	            // Delete the old files
	            File::delete('images/posts/' . $image);
	        }
	    }

	    // Process Post Object
	    public function processPostObject($post, $request) {
	        // Store all the data in the object
	        $post->title = Purifier::clean($request->title);
	        $post->subtitle = Purifier::clean($request->subtitle);
	        $post->body = Purifier::clean($request->body);
	        $post->slug = $this->generateSlug($request->title);
	        $post->user_id = Auth::user()->id;
	        $post->category_id = $request->category;
	        $post->published_at = $this->getPublishedAtDate($request->status);

	        // Upload the Image and Save the Filename to the Part Object
	        // Check if the request has an image
	        if($request->hasFile('image')) {
	            if($request->isMethod('PUT')) {
	                $post->image = $this->uploadImage($request, $post);
	            } else {
	                $post->image = $this->uploadImage($request);
	            }
	        }
	    }

	    // Generate Slug
	    public function generateSlug($title) {
	        $trimedTitle = Str::limit($title, 85, '');
	        return $slug = Str::slug($trimedTitle, '-') . '-' . time();
	    }

	    // Get Categories Array
	    protected function getCategoriesArray($categories) {

	        // Create a new categories array
	        $categories_array = [];

	        // Loop through the categories and add each category to the array
	        foreach($categories as $category) {
	            $categories_array[$category->id] = $category->name;
	        }

	        return $categories_array;
	    }

	    // Check if categories exist
	    public function checkCategories($categories) {
	        if(!$categories->count()) {
	            Session::flash('warning', 'You haven\'t created any categories. Please create a category first befor making a post.');

	            return redirect()->route('category.index');
	        }
	    }


}