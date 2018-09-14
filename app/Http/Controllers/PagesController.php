<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\Pages\About;
use App\Models\SiteSetting;
use App\Notifications\ContactPageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Purifier;
use Session;

class PagesController extends Controller
{
    // Get the Index Page (/)
    public function getIndex() {
    	return view('pages.index');
    }

    // About Us Page (/about)
    public function getAbout() {
    	$admins = Admin::all();

        $settings = About::all()->first();

    	return view('pages.about')
    				->withAdmins($admins)
                    ->withSettings($settings);
    }

    // Contact Page (/contact)
    public function getContact() {
        return view('pages.contact');
    }

    // Send Contact Page Email
    public function sendContact(Request $request) {

        $this->validate($request, ['message' => 'required|string|min:10']);

        $message = Purifier::clean($request->message);

        Notification::route('mail', 'modelawiki@gmail.com')
                                ->notify(new ContactPageNotification($message, $request->email));

        Session::flash('success', 'Email Sent Successfully!');

        return redirect()->route('pages.contact');

    }

    // Get Terms of Service Page (/terms-of-service)
    public function getTerms() {
        $settings = SiteSetting::all()->first();

        return view('pages.terms')->withSettings($settings);
    }

    // Get Terms of Service Page (/terms-of-service)
    public function getPrivacy() {
        $settings = SiteSetting::all()->first();

        return view('pages.privacy')->withSettings($settings);
    }
}
