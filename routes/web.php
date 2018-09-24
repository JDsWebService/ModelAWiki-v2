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

// ------------------------- Admin Facing Routes ------------------------- //

// Admin (/admin)
Route::prefix('admin')->group(function () {

	// Site Settings (/admin/site)
	Route::prefix('site')->middleware('can:admin.global')->group(function () {

		// Site Settings (/admin/site/settings)
		Route::get('settings', 'Site\SettingsController@edit')
									->name('admin.site.setting.edit');
		Route::put('settings/{id?}', 'Site\SettingsController@update')
									->name('admin.site.setting.update');

		// Contact Page Settings (/admin/site/contact)
		Route::get('contact', 'Site\ContactController@edit')
									->name('admin.site.contact.edit');
		Route::put('contact/{id?}', 'Site\ContactController@update')
									->name('admin.site.contact.update');

		// Admin About Us Settings (/admin/site/about)
		Route::get('about', 'Site\AboutController@edit')
								->name('admin.site.about.edit');
		Route::put('about/{id?}', 'Site\AboutController@update')
								->name('admin.site.about.update');

		// Admin Homepage Settings (/admin/site/homepage)
		Route::get('homepage/types', 'Site\HomepageController@typesInfo')->name('admin.site.homepage.types');
		Route::resource('homepage', 'Site\HomepageController', ['as' => 'admin.site']);

		// Social Media Links (/admin/site/social-links)
		Route::resource('social-links', 'Site\SocialLinksController', ['as' => 'admin.site']);

	});

	// Admin Part Sections (/part/section)
	Route::resource('part/section', 'Parts\SectionsController', ['as' => 'part'])
							->middleware('can:part.section.global'); // name('part.section.*')

	// Admin Part (/part)
	Route::resource('part', 'Parts\PartsController')
							->middleware('can:part.global');

	// Admin (/tag)
	Route::resource('tag', 'Blog\TagsController')
							->middleware('can:tag.global');

	// Admin (/category)
	Route::resource('category', 'Blog\CategoriesController')
							->middleware('can:category.global');

	// Admin (/post)
	Route::resource('post', 'Blog\PostsController')
							->middleware('can:post.global');

	// Admin Roles (/admin/role)
	Route::resource('role', 'Admin\RoleController', ['as' => 'admin'])
							->middleware('can:admin.global');

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

		// Admin Management Deactivate
		Route::get('{id}/activate', 'Admin\AdminManagementController@activate')->name('admin.manage.activate');

	}); // End Admin Management

	// Admin Dashboard (/admin/dashboard)
	Route::get('dashboard', 'Admin\AdminController@getDashboard')->name('admin.dashboard');

	// Admin First Login
	Route::get('first-login/{token}', 'Admin\AdminController@firstLoginForm')->name('admin.first-login');
	Route::post('first-login', 'Admin\AdminController@firstLoginSubmit')->name('admin.first-login.submit');

	// Admin Profile
	Route::get('profile', 'Admin\ProfileController@getProfile')->name('admin.profile.self');
	Route::get('profile/settings', 'Admin\ProfileController@getSettings')->name('admin.profile.settings');
	Route::put('profile/settings', 'Admin\ProfileController@saveProfile')->name('admin.profile.save');
	Route::get('profile/public/{admin}', 'Admin\ProfileController@getPublicProfile')->name('admin.profile.public');

	// Admin Authentication Routes
	Route::get('login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

	// Admin Password Reset Routes...
	Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset');

}); // End Admin


// ------------------------- User Facing Routes ------------------------- //

// Wiki Routes
Route::prefix('wiki')->group(function () {

	// Sections Index (/wiki/sections)
	Route::get('sections', 'Wiki\WikiController@sectionsIndex')->name('wiki.section.index');

	// Specific Section (/wiki/section/{slug})
	Route::get('section/{slug}', 'Wiki\WikiController@getSection')->name('wiki.section');

	// Specific Part (/wiki/part/{part_number})
	Route::get('part/{part_number}', 'Wiki\WikiController@getPart')->name('wiki.part');

}); // End Wiki

// User (/user)
Route::prefix('user')->group(function () {

	// (/user/dashboard)
	Route::get('dashboard', 'User\UserController@getDashboard')->name('user.dashboard');

}); // End User

// Socialite Facebook Login Routes
Route::get('login/facebook', 'Auth\SocialiteLoginController@redirectToFacebookProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\SocialiteLoginController@handleFacebookProviderCallback');
// Socialite Twitter Login Routes
Route::get('login/twitter', 'Auth\SocialiteLoginController@redirectToTwitterProvider')->name('login.twitter');
Route::get('login/twitter/callback', 'Auth\SocialiteLoginController@handleTwitterProviderCallback');
// Socialite Google Login Routes
Route::get('login/google', 'Auth\SocialiteLoginController@redirectToGoogleProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\SocialiteLoginController@handleGoogleProviderCallback');
// User Authentication Routes
Auth::routes();

// About Us (/about)
Route::get('about', 'PagesController@getAbout')->name('pages.about');

// Contact (/contact)
Route::get('contact', 'PagesController@getContact')->name('pages.contact');
Route::post('contact', 'PagesController@sendContact')->name('pages.contact.send');

// Blog (/blog)
Route::get('blog', 'Blog\BlogController@index')->name('blog.index');
Route::get('blog/post/{slug}', 'Blog\BlogController@post')->name('blog.post');
Route::get('blog/category/{slug}', 'Blog\BlogController@category')->name('blog.category');

// Terms of Service (/terms-of-service)
Route::get('terms-of-service', 'PagesController@getTerms')->name('pages.terms');

// Privacy Policy (/privacy-policy)
Route::get('privacy-policy', 'PagesController@getPrivacy')->name('pages.privacy');

// Site Homepage (/)
Route::get('/', 'PagesController@getIndex')->name('pages.index');