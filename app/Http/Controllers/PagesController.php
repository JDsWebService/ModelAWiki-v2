<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\Pages\About;
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

    // About Us Page
    public function getAbout() {
    	$admins = Admin::all();

        $settings = About::all()->first();

    	return view('pages.about')
    				->withAdmins($admins)
                    ->withSettings($settings);
    }

    // Contact Page
    public function getContact() {
        return view('pages.contact');
    }

    public function sendContact(Request $request) {

        $this->validate($request, ['message' => 'required|string|min:10']);

        $message = Purifier::clean($request->message);

        Notification::route('mail', 'modelawiki@gmail.com')
                                ->notify(new ContactPageNotification($message, $request->email));

        Session::flash('success', 'Email Sent Successfully!');

        return redirect()->route('pages.contact');

    }
}
