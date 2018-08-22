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

// User Authentication Routes
Auth::routes();

// Parts Group (/blog)
Route::get('blog', 'BlogController@index')->name('blog.index');

// (/part/section)
Route::resource('part/section', 'Parts\SectionsController', ['as' => 'part']); // name('part.section.*')

// Part CRUD
Route::resource('part', 'Parts\PartsController');

// (/tag)
Route::resource('tag', 'TagsController');

// (/category)
Route::resource('category', 'CategoriesController');

// (/post)
Route::resource('post', 'PostsController');

// (/admin)
Route::prefix('admin')->group(function () {

	// Admin Dashboard (/admin/dashboard)
	Route::get('dashboard', 'AdminController@getDashboard')->name('admin.dashboard');

	// Admin Authentication Routes
	Route::get('login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset');

});

// (/user)
Route::prefix('user')->group(function () {
	// (/user/dashboard)
	Route::get('dashboard', 'UserController@getDashboard')->name('user.dashboard');
});

// Homepage (/)
Route::get('/', 'PagesController@getIndex')->name('pages.index');