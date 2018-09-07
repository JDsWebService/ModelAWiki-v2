<?php

namespace App\Policies\Blog;

use App\Models\Admin\Admin;
use App\Traits\Admin\PoliciesTrait;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriesPolicy
{
    use HandlesAuthorization;
    use PoliciesTrait;

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function view($admin)
    {
        return $this->userHasAccess('category-view', $admin);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function create($admin)
    {
        return $this->userHasAccess('category-create', $admin);
    }

    /**
     * Determine whether the user can edit the category.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function edit($admin)
    {
        return $this->userHasAccess('category-edit', $admin);
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function update($admin)
    {
        return $this->userHasAccess('category-update', $admin);
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function delete($admin)
    {
        return $this->userHasAccess('category-delete', $admin);
    }

    /**
     * Determine whether the user can access the Category CRUD.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function global($admin)
    {
        return $this->userHasAccess('category-global', $admin);
    }

}
