<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartSectionsPolicy
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
     * Determine whether the user can view the Part Section.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function view($admin)
    {
        return $this->userHasAccess('part-section-view', $admin);
    }

    /**
     * Determine whether the user can create Part Section.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function create($admin)
    {
        return $this->userHasAccess('part-section-create', $admin);
    }

    /**
     * Determine whether the user can edit the Part Section.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function edit($admin)
    {
        return $this->userHasAccess('part-section-edit', $admin);
    }

    /**
     * Determine whether the user can update the Part Section.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function update($admin)
    {
        return $this->userHasAccess('part-section-update', $admin);
    }

    /**
     * Determine whether the user can delete the Part Section.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function delete($admin)
    {
        return $this->userHasAccess('part-section-delete', $admin);
    }

    /**
     * Determine whether the user can access the Part Section CRUD.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function global($admin)
    {
        return $this->userHasAccess('part-section-global', $admin);
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
