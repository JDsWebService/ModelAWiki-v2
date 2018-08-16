<?php

namespace App\Traits;

use Str;

trait CategoryTrait {

	// Process Category Object
	public function processCategoryObject($category, $request) {
	    $category->name = $request->name;
	    $category->slug = Str::slug($request->name, '-') . '-' . time();
	}

}