<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Rules\UniquePermission;
use Illuminate\Http\Request;
use Session;
use App\Traits\Admin\PermissionsTrait;

class PermissionController extends Controller
{
    use PermissionsTrait;

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

        $permissions = Permission::orderBy('category', 'asc')->paginate(15);

        return view('admin.permission.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new single permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSingle()
    {
        // Check Authorization
        $this->authorize('admin.global');

        $categories = Permission::all()->pluck('category')->unique();

        return view('admin.permission.create-single')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCRUD()
    {
        // Check Authorization
        $this->authorize('admin.global');

        $categories = Permission::all()->pluck('category')->unique();

        return view('admin.permission.create-crud')->withCategories($categories);
    }

    /**
     * Store a newly created single permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSingle(Request $request)
    {
        // Check Authorization
        $this->authorize('admin.global');

        $this->validate($request, [
            'name' => 'required|max:255|string',
            'slug' => ['required', 'max:50', 'string', new UniquePermission],
            'category' => 'required|max:100|string',
            'description' => 'required|string'
        ]);

        $permission = new Permission;

        $permission->name = $request->name;
        $permission->slug = strtolower($request->slug);
        $permission->category = $request->category;
        $permission->description = $request->description;

        $permission->save();

        Session::flash('success', 'Created Permission Successfully');

        return redirect()->route('admin.permission.index');
    }

     /**
     * Store a newly created CRUD permissions in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCRUD(Request $request)
    {
        // Check Authorization
        $this->authorize('admin.global');
        
        // Put the requests into an array
        $permissionRequests = $this->createCRUDPermissionsArray($request);

        // Validate the CRUD Requests
        foreach($permissionRequests as $request) {
            $this->validate($request, [
                'name' => 'required|max:255|string',
                'slug' => ['required', 'max:50', 'string', new UniquePermission],
                'category' => 'required|max:100|string',
                'description' => 'required|string'
            ]);
        }

        foreach($permissionRequests as $request) {
            $permission = new Permission;

            $permission->name = $request->name;
            $permission->slug = strtolower($request->slug);
            $permission->category = $request->category;
            $permission->description = $request->description;

            $permission->save();
        }

        Session::flash('success', 'Created CRUD Permissions Successfully');

        return redirect()->route('admin.permission.index');
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

        $permission = Permission::find($id);

        return view('admin.permission.show')->withPermission($permission);
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

        $permission = Permission::find($id);

        $categories = Permission::all()->pluck('category')->unique();

        foreach($categories as $category) {
            $category_array[$category] = $category;
        }

        return view('admin.permission.edit')->withCategories($category_array)->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSingle(Request $request, $id)
    {
        // Check Authorization
        $this->authorize('admin.global');

        $this->validate($request, [
            'name' => 'required|max:255|string',
            'slug' => ['required', 'max:50', 'string', new UniquePermission],
            'category' => 'required|max:100|string',
            'description' => 'required|string'
        ]);

        $permission = Permission::find($id);

        $permission->name = $request->name;
        $permission->slug = strtolower($request->slug);
        $permission->category = $request->category;
        $permission->description = $request->description;

        $permission->save();

        Session::flash('success', 'Created Permission Successfully');

        return redirect()->route('admin.permission.index');
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
        
        $permission = Permission::find($id);

        $permission->roles()->detach();

        $permission->delete();

        Session::flash('success', 'Permission has been deleted!');

        return redirect()->route('admin.permission.index');
    }
}
