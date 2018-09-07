<?php

namespace App\Traits\Admin;

trait PoliciesTrait {

	/**
     * Check if the user is a Super Administrator before doing anything else.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function before($admin)
    {
        foreach($admin->roles as $role) {
            if(strtolower($role->name) == "super user") {
                return true;
            }
        }
    }
    
	/**
	 * Check whether the user has the correct permission.
	 *
	 * @param  str $permissionName
	 * @param  \App\Models\Admin\Admin $admin
	 * @return bool
	 */
	protected function userHasAccess($permissionName, $admin) {
	    foreach($admin->roles as $role) {
	        foreach($role->permissions as $permission) {
	            if($permission->name == $permissionName) {
	                return true;
	            }
	        }
	    }
	    return false;
	}

}