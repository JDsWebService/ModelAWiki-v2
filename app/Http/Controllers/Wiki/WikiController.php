<?php

namespace App\Http\Controllers\Wiki;

use App\Http\Controllers\Controller;
use App\Models\Parts\Image;
use App\Models\Parts\Part;
use App\Models\Parts\Section;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    // Sections Index
    public function sectionsIndex() {
    	$sections = Section::orderBy('name')->get();
    	
    	return view('wiki.sectionIndex')->withSections($sections);
    }

    // Specific Section
    public function getSection($slug) {
    	$section = Section::where('slug', $slug)->first();

    	$parts = Section::where('slug', $slug)->first()->parts()->orderBy('created_at', 'desc')->paginate(10);

    	return view('wiki.section')
    				->withParts($parts)
    				->withSection($section);
    }

    // Specific Part
    public function getPart($slug) {
    	$part = Part::where('slug', $slug)->first();
        $images = Image::where('part_id', $part->id)->where('approved', '1')->get();

    	return view('wiki.part')
    				->withPart($part)
                    ->withImages($images);
    }
}
