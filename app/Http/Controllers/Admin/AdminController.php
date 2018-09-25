<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\MakeAdmin;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth:admin')->except('firstLoginForm', 'firstLoginSubmit');
	}

    // Get Dashboard (/admin/dashboard)
    public function getDashboard() {
    	return view('admin.dashboard');
    }

    // First Loging Form
    public function firstLoginForm($token) {
    	return view('admin.first-login')->withToken($token);
    }

    // First Login Submit
    public function firstLoginSubmit(Request $request) {

    	$admin = MakeAdmin::where('email', '=', $request->email)->first();
    	
    	// Check if admin exists in our database
    	if($admin) {
    		// Check if Admin Credentials Match our Records
    		if($this->checkAdminCredentials($admin, $request)) {
    			// Check if the timestamp is older then ten minutes
    			if($this->isLinkActive($admin->created_at)) {

    				// If you got this far then process the request
    				$this->validate($request, [
    					'email' => 'required|email',
    					'password' => 'required|string|min:6|confirmed',
                        'username' => 'required|string|min:3|unique:admins',
    				]);
    				
    				$newAdmin = Admin::where('email', '=', $request->email)->first();

                    $newAdmin->username = $request->username;
    				$newAdmin->password = Hash::make($request->password);
    				$newAdmin->active = 1;
    				$newAdmin->save();

    				$admin->delete();

    				Session::flash('success', 'You have successfully created your username and password. You may now login.');
    				return redirect()->route('admin.login');

    			} else {
    				// Timestamp Expired
    				Session::flash('danger', 'It has been longer then 10 minutes since you recieved the email. Contact an Administrator for further help');
    				return redirect()->route('admin.first-login', $request->token);
    			}
    		} else {
    			// Credentials are wrong
    			Session::flash('danger', 'The credentials you entered didn\'t match our records');
    			return redirect()->route('admin.first-login', $request->token);
    		}
    	} else {
    		// No Admin User Exists
    		Session::flash('danger', 'The credentials you entered didn\'t match our records');
    		return redirect()->route('admin.first-login', $request->token);
    	}
    	

    }

    // Check to see if link is active
    // @var DATETIME $time
    protected function isLinkActive($time) {
    	if(strtotime($time) < strtotime('10 minutes')) {
    		return true;
    	}
    	return false;
    }

    // Check to see whether the admin credentials match our records
    // @var String $admin Admin User
    // @var String $request Illuminate\Http\Requests\Request
    protected function checkAdminCredentials($admin, $request) {
    	if($admin->token === $request->token && $admin->email === $request->email) {
    		return true;
    	}
    	return false;
    }







}
