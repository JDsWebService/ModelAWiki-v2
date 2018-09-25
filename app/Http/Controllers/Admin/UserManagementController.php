<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\MakeAdmin;
use App\Models\User\User;
use App\Notifications\MakeAdminNotification;
use App\Traits\UsernameTrait;
use Illuminate\Http\Request;
use Session;

class UserManagementController extends Controller
{

    use UsernameTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->paginate('15');

        return view('admin.user_management.index')->withUsers($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user_management.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified user from the site and place on the blacklist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ban($id)
    {
        //
    }

    /**
     * Make the specified user an Administrator to the site.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makeAdmin($id)
    {
        $user = User::find($id);

        $admin = new Admin;
        $admin->first_name = $user->first_name;
        $admin->last_name = $user->last_name;
        $admin->email = $user->email;
        $admin->username = $this->generateRandomUserNumber('admin');
        $admin->password = null;
        $admin->save();

        $token = str_random(50);

        $admin = new MakeAdmin;
        $admin->token = $token;
        $admin->email = $user->email;
        $admin->save();

        $admin->notify(new MakeAdminNotification($token, $user->email));

        Session::flash('success', 'User has been made an Administrator');

        return redirect()->route('user.manage.index');
    }
}
