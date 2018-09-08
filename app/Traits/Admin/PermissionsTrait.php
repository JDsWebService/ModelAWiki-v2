<?php

namespace App\Traits\Admin;

trait PermissionsTrait {

	/**
     * Creates an array of HTTP Requests defining each Permission for a basic CRUD resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
	public function createCRUDPermissionsArray($request) {
		$view = new \Illuminate\Http\Request();
        $view->setMethod('POST');
        $view->request->add(['name' => "View"]);
        $view->request->add(['slug' => $request->prefix . "-view"]);
        $view->request->add(['category' => $request->category]);
        $view->request->add(['description' => "Allows the user to view the specified resource"]);

        $create = new \Illuminate\Http\Request();
        $create->setMethod('POST');
        $create->request->add(['name' => "Create"]);
        $create->request->add(['slug' => $request->prefix . "-create"]);
        $create->request->add(['category' => $request->category]);
        $create->request->add(['description' => "Allows the user to create the specified resource"]);

        $update = new \Illuminate\Http\Request();
        $update->setMethod('POST');
        $update->request->add(['name' => "Update"]);
        $update->request->add(['slug' => $request->prefix . "-update"]);
        $update->request->add(['category' => $request->category]);
        $update->request->add(['description' => "Allows the user to update the specified resource"]);

        $delete = new \Illuminate\Http\Request();
        $delete->setMethod('POST');
        $delete->request->add(['name' => "Delete"]);
        $delete->request->add(['slug' => $request->prefix . "-delete"]);
        $delete->request->add(['category' => $request->category]);
        $delete->request->add(['description' => "Allows the user to delete the specified resource"]);

        $edit = new \Illuminate\Http\Request();
        $edit->setMethod('POST');
        $edit->request->add(['name' => "Edit"]);
        $edit->request->add(['slug' => $request->prefix . "-edit"]);
        $edit->request->add(['category' => $request->category]);
        $edit->request->add(['description' => "Allows the user to edit the specified resource"]);

        $global = new \Illuminate\Http\Request();
        $global->setMethod('POST');
        $global->request->add(['name' => "Global"]);
        $global->request->add(['slug' => $request->prefix . "-global"]);
        $global->request->add(['category' => $request->category]);
        $global->request->add(['description' => "Allows the user to access the specified resource"]);

        return array($create, $view, $update, $delete, $edit, $global);
	}


}