<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Get the User Dashboard (/user/dashboard)
    public function getDashboard() {
    	return view('user.dashboard');
    }
}
