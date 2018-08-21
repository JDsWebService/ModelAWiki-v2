<?php

namespace App\Traits\Parts;

use Str;
use Session;

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

	// Check if Sections Exist
	public function doSectionsExist($sections) {
		// If sections count is 0 then return false
		if($sections->count() == 0) {
			Session::flash('info', 'You have automatically been redirected.');
			Session::flash('warning', 'There are no sections. Please create a section first!');
			return false;
		}

		// Otherwise return true
		return true;
	}

}