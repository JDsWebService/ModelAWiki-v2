<?php

namespace App\Traits\Parts;

use Str;

trait SectionsTrait {

	// Process Section Object
	public function processSectionObject($section, $request) {
	    $section->name = $request->name;
	    $section->slug = $this->generateSectionSlug($request->name);
	}

	// Generate Slug
	public function generateSectionSlug($name) {
	    $trimedName = Str::limit($name, 85, '');
	    return $slug = Str::slug($trimedName, '-') . '-' . time();
	}

	// Check if sections exist
	public function checkIfCategoriesExist($sections) {
	    if(!$sections->count()) {
	    	Session::flash('info', 'You\'ve been automatically redirected.');
	    	
	        Session::flash('warning', 'You haven\'t created any sections. Please create a section first before making a Part.');

	        return true;
	    }
	}

}