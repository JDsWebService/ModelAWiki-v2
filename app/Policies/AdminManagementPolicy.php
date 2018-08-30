<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminManagementPolicy
{
    use HandlesAuthorization;

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
     * Determine whether the user can access Admin Management.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function global($admin)
    {
        return $this->userHasAccess('admin-global', $admin);
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
