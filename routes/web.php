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

// Admin Part Sections (/part/section)
Route::resource('part/section', 'Parts\SectionsController', ['as' => 'part'])->middleware('can:part.section.global'); // name('part.section.*')

// Admin Part (/part)
Route::resource('part', 'Parts\PartsController')->middleware('can:part.global');

// Admin (/tag)
Route::resource('tag', 'Blog\TagsController')->middleware('can:tag.global');

// Admin (/category)
Route::resource('category', 'Blog\CategoriesController')->middleware('can:category.global');

// Admin (/post)
Route::resource('post', 'Blog\PostsController')->middleware('can:post.global');

// User (/blog)
Route::get('blog', 'Blog\BlogController@index')->name('blog.index');

// Admin (/admin)
Route::prefix('admin')->group(function () {

	// Admin Dashboard (/admin/dashboard)
	Route::get('dashboard', 'Admin\AdminController@getDashboard')->name('admin.dashboard');

	// Admin First Login
	Route::get('first-login/{token}', 'Admin\AdminController@firstLoginForm')->name('admin.first-login');
	Route::post('first-login', 'Admin\AdminController@firstLoginSubmit')->name('admin.first-login.submit');

	// Admin Roles (/admin/role)
	Route::resource('role', 'Admin\RoleController', ['as' => 'admin'])->middleware('can:admin.global');

	// Admin Roles (/admin/permission)
	Route::prefix('permission')->middleware('can:admin.global')->group(function () {
		Route::get('create/single', 'Admin\PermissionController@createSingle')->name('admin.permission.create.single');
		Route::post('create/single', 'Admin\PermissionController@storeSingle')->name('admin.permission.store.single');
		Route::put('{permission}', 'Admin\PermissionController@updateSingle')->name('admin.permission.update.single');
		Route::get('create/crud', 'Admin\PermissionController@createCRUD')->name('admin.permission.create.crud');
		Route::post('create/crud', 'Admin\PermissionController@storeCRUD')->name('admin.permission.store.crud');
	});
	Route::resource('permission', 'Admin\PermissionController', ['as' => 'admin'])->except('create', 'store', 'update');

	// User Management (/admin/user/manage)
	Route::prefix('user/manage')->middleware('can:user.global')->group(function () {

		// User Management Index
		Route::get('/', 'Admin\UserManagementController@index')->name('user.manage.index');

		// User Management Show
		Route::get('{id}/show', 'Admin\UserManagementController@show')->name('user.manage.show');

		// User Management Edit
		Route::get('{id}/edit', 'Admin\UserManagementController@edit')->name('user.manage.edit');

		// User Management Ban
		Route::get('{id}/ban', 'Admin\UserManagementController@ban')->name('user.manage.ban');

		// User Management Make Admin
		Route::post('{id}/make-admin', 'Admin\UserManagementController@makeAdmin')->name('user.manage.make-admin')->middleware('can:admin.global');

	}); // End User Management

	// Admin Management (/admin/manage)
	Route::prefix('manage')->middleware('can:admin.global')->group(function () {
		// Admin Management Index
		Route::get('/', 'Admin\AdminManagementController@index')->name('admin.manage.index');

		// Admin Management Show
		Route::get('{id}/show', 'Admin\AdminManagementController@show')->name('admin.manage.show');

		// Admin Management Edit
		Route::get('{id}/edit', 'Admin\AdminManagementController@edit')->name('admin.manage.edit');

		// Admin Management Update
		Route::put('{id}', 'Admin\AdminManagementController@update')->name('admin.manage.update');

		// Admin Management Deactivate
		Route::post('{id}/deactivate', 'Admin\AdminManagementController@deactivate')->name('admin.manage.deactivate');

	}); // End Admin Management

	// Admin Authentication Routes
	Route::get('login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset');

}); // End Admin

// User (/user)
Route::prefix('user')->group(function () {

	// (/user/dashboard)
	Route::get('dashboard', 'User\UserController@getDashboard')->name('user.dashboard');

}); // End User

// Site Homepage (/)
Route::get('/', 'PagesController@getIndex')->name('pages.index');