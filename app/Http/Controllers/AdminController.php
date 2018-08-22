<?php

namespace App\Http\Controllers;

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
	    $this->middleware('auth:admin');
	}

    // Get Dashboard (/admin/dashboard)
    public function getDashboard() {
    	return view('admin.dashboard');
    }
}
