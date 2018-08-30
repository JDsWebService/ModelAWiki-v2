<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartsPolicy
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
     * Determine whether the user can view the part.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function view($admin)
    {
        return $this->userHasAccess('part-view', $admin);
    }

    /**
     * Determine whether the user can create parts.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function create($admin)
    {
        return $this->userHasAccess('part-create', $admin);
    }

    /**
     * Determine whether the user can edit the part.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function edit($admin)
    {
        return $this->userHasAccess('part-edit', $admin);
    }

    /**
     * Determine whether the user can update the part.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function update($admin)
    {
        return $this->userHasAccess('part-update', $admin);
    }

    /**
     * Determine whether the user can delete the part.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function delete($admin)
    {
        return $this->userHasAccess('part-delete', $admin);
    }

    /**
     * Determine whether the user can access the Parts CRUD.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function global($admin)
    {
        return $this->userHasAccess('part-global', $admin);
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
