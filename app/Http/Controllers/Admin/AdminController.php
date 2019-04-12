<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;

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

    







}
