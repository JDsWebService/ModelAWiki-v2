<?php

namespace App\Http\Controllers\Wiki;

use App\Http\Controllers\Controller;
use App\Models\Parts\Section;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    // Sections Index
    public function sectionsIndex() {
    	$sections = Section::orderBy('name')->get();
    	
    	return view('wiki.sections')->withSections($sections);
    }
}
