<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Get Dashboard (/admin/dashboard)
    public function getDashboard() {
    	return view('admin.dashboard');
    }
}
