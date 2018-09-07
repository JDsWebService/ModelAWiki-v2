<?php

namespace App\Policies\Blog;

use App\Models\Admin\Admin;
use App\Traits\Admin\PoliciesTrait;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagsPolicy
{
    use HandlesAuthorization;
    use PoliciesTrait;

    /**
     * Determine whether the user can view the tag.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function view($admin)
    {
        return $this->userHasAccess('tag-view', $admin);
    }

    /**
     * Determine whether the user can create tags.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function create($admin)
    {
        return $this->userHasAccess('tag-create', $admin);
    }

    /**
     * Determine whether the user can edit the tag.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function edit($admin)
    {
        return $this->userHasAccess('tag-edit', $admin);
    }

    /**
     * Determine whether the user can update the tag.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function update($admin)
    {
        return $this->userHasAccess('tag-update', $admin);
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function delete($admin)
    {
        return $this->userHasAccess('tag-delete', $admin);
    }

    /**
     * Determine whether the user can access the Tags CRUD.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function global($admin)
    {
        return $this->userHasAccess('tag-global', $admin);
    }

}
