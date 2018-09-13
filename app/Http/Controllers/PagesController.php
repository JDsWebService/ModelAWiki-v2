<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\Pages\About;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Get the Index Page (/)
    public function getIndex() {
    	return view('pages.index');
    }

    // About Us Page
    public function getAbout() {
    	$admins = Admin::all();

        $settings = About::all()->first();

    	return view('pages.about')
    				->withAdmins($admins)
                    ->withSettings($settings);
    }
}
