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
            Image::make($image)->fit(1080,300)->save($location);

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
        $post->slug = $this->generatePostSlug($request->title);
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
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
    public function generatePostSlug($title) {
        $trimedTitle = Str::limit($title, 85, '');
        return $slug = Str::slug($trimedTitle, '-') . '-' . time();
    }

	    


}