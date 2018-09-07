<?php

namespace App\Traits\Blog;

use Str;

trait TagsTrait {

	// Process Tag Object
	public function processTagObject($tag, $request) {
		$tag->name = $request->name;
		$tag->slug = $this->generateTagSlug($request->name);
	}

	// Generate Slug
	public function generateTagSlug($name) {
	    $trimedName = Str::limit($name, 85, '');
	    return $slug = Str::slug($trimedName, '-') . '-' . time();
	}

	// Get Tags Array
	public function getTagsArray($tags) {
		$array = [];
		foreach($tags as $tag) {
			$array[$tag->id] = $tag->name;
		}
		return $array;
	}

}