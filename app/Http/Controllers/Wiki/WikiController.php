<?php

namespace App\Http\Controllers\Wiki;

use App\Http\Controllers\Controller;
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
    public function getPart($partNumber) {
    	$part = Part::where('part_number', $partNumber)->first();

    	return view('wiki.part')
    				->withPart($part);
    }
}
