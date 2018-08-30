<?php

namespace App\Traits\Admin;

use Str;

trait RolesTrait {

	// Process Tag Object
	public function processRoleObject($role, $request) {
		$role->name = $request->name;
		$role->slug = $this->generateRoleSlug($request->name);
	}

	// Generate Slug
	public function generateRoleSlug($name) {
	    $trimedName = Str::limit($name, 85, '');
	    return $slug = Str::slug($trimedName, '-') . '-' . time();
	}

	// Get Roles Array
	public function getRolesArray($roles) {
		$array = [];
		foreach($roles as $role) {
			$array[$role->id] = $role->name;
		}
		return $array;
	}

}