<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Session;

class AdminManagementController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check Authorization
        $this->authorize('admin.global');

        $admins = Admin::orderBy('created_at', 'asc')->paginate('15');

        return view('admin.admin_management.index')->withAdmins($admins);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Check Authorization
        $this->authorize('admin.global');

        $admin = Admin::find($id);

        return view('admin.admin_management.show')->withAdmin($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check Authorization
        $this->authorize('admin.global');

        $admin = Admin::find($id);

        $roles = Role::all();

        return view('admin.admin_management.edit')->withAdmin($admin)->withRoles($roles);
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
        // Check Authorization
        $this->authorize('admin.global');

        $admin = Admin::find($id);

        $this->validate($request, [
            'first_name' => 'required|max:255|string',
            'last_name' => 'required|max:255|string',
            'email' => 'required|max:255|email',
        ]);

        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;

        $admin->save();

        $admin->roles()->sync($request->roles);

        Session::flash('success', 'Saved the Administrator data successfully.');

        return redirect()->route('admin.manage.index');
    }

    /**
     * Remove the specified admin from the site.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        // Check Authorization
        $this->authorize('admin.global');
        
        $admin = Admin::find($id);

        $admin->active = 0;

        $admin->save();

        Session::flash('success', 'Deactived this administrator.');

        return redirect()->route('admin.manage.index');
    }
}
