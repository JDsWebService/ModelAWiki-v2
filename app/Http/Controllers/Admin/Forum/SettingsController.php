<?php

namespace App\Http\Controllers\Admin\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\ForumSettings;
use App\Traits\Forum\SettingsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class SettingsController extends Controller
{

	use SettingsTrait;

    // Get the Settings Page
    public function getSettings() {
    	$settings = ForumSettings::first();

    	return view('admin.forum.settings')
    								->withSettings($settings);
    }

    public function saveSettings(Request $request) {
    	
    	$this->validate($request, [
    		'heading' => 'required|min:5|max:255|string',
    		'motd' => 'required|min:5|max:255|string',
    		'image' => 'sometimes|image'
    	]);

    	$settings = ForumSettings::first();

    	if(!$settings) {
    		$settings = new ForumSettings;
    	}

    	$settings->heading = Purifier::clean($request->heading);
    	$settings->motd = Purifier::clean($request->motd);
    	if($request->hasFile('image')) {
    		$settings->image = $this->uploadImage($request, $settings);
    	}
    	

    	$settings->save();

    	Session::flash('success', 'Saved Forum Settings Successfully');

    	return redirect()->route('admin.forum.settings');
    }
}
