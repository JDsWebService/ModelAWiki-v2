<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Traits\Admin\RolesTrait;
use Illuminate\Http\Request;
use Session;

class RoleController extends Controller
{
    use RolesTrait;
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

        $roles = Role::paginate(10);

        return view('admin.role.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Authorization
        $this->authorize('admin.global');

        $permissionsByCategory = Permission::all()->groupBy('category');

        return view('admin.role.create')->withPermissionsByCategory($permissionsByCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check Authorization
        $this->authorize('admin.global');

        $role = new Role;

        $this->processRoleObject($role, $request);

        $role->save();

        $role->permissions()->sync($request->permissions);

        Session::flash('success', 'Created Role Successfully!');

        return redirect()->route('admin.role.index');
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

        $role = Role::find($id);

        $permissionsByCategory = Permission::all()->groupBy('category');

        return view('admin.role.show')->withRole($role)->withPermissionsByCategory($permissionsByCategory);
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

        $role = Role::find($id);

        $permissionsByCategory = Permission::all()->groupBy('category');

        return view('admin.role.edit')->withRole($role)->withPermissionsByCategory($permissionsByCategory);
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

        $role = Role::find($id);

        $this->processRoleObject($role, $request);

        $role->save();

        $role->permissions()->sync($request->permissions);

        Session::flash('success', 'Saved Role Successfully!');

        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check Authorization
        $this->authorize('admin.global');
        
        $role = Role::find($id);

        $role->users()->detach();

        $role->permissions()->detach();

        $role->delete();

        Session::flash('success', 'Role has been deleted!');

        return redirect()->route('admin.role.index');
    }
}
