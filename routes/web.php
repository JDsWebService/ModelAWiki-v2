<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Auth::routes();

// (/admin)
Route::prefix('admin')->group(function () {

	// (/admin/dashboard)
	Route::get('dashboard', 'AdminController@getDashboard')->name('admin.dashboard');

});

// (/user)
Route::prefix('user')->group(function () {
	// (/user/dashboard)
	Route::get('dashboard', 'UserController@getDashboard')->name('user.dashboard');
});

// Homepage (/)
Route::get('/', 'PagesController@getIndex')->name('pages.index');