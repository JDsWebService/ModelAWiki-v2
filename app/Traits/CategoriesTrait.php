<?php

namespace App\Traits;

use Str;

trait CategoriesTrait {

	// Process Category Object
	public function processCategoryObject($category, $request) {
	    $category->name = $request->name;
	    $category->slug = $this->generateCategorySlug($request->name);
	}

	// Generate Slug
	public function generateCategorySlug($name) {
	    $trimedName = Str::limit($name, 85, '');
	    return $slug = Str::slug($trimedName, '-') . '-' . time();
	}

	// Check if categories exist
	public function checkIfCategoriesExist($categories) {
	    if(!$categories->count()) {
	    	Session::flash('info', 'You\'ve been automatically redirected.');
	    	
	        Session::flash('warning', 'You haven\'t created any categories. Please create a category first before making a post.');

	        return true;
	    }
	}

}