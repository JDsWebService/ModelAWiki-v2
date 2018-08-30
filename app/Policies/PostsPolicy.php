<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
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
     * Determine whether the user can view the post.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function view($admin)
    {
        return $this->userHasAccess('post-view', $admin);
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return d
     */
    public function create($admin)
    {
        return $this->userHasAccess('post-create', $admin);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function update($admin)
    {
        return $this->userHasAccess('post-update', $admin);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function delete($admin)
    {
        return $this->userHasAccess('post-delete', $admin);
    }

    /**
     * Determine whether the user can publish the post.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function publish($admin)
    {
        return $this->userHasAccess('post-publish', $admin);
    }

    /**
     * Determine whether the user can edit the post.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function edit($admin)
    {
        return $this->userHasAccess('post-edit', $admin);
    }

    /**
     * Determine whether the user can access the posts CRUD.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function global($admin)
    {
        return $this->userHasAccess('post-global', $admin);
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
