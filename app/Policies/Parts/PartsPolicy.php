<?php

namespace App\Policies\Parts;

use App\Models\Admin\Admin;
use App\Traits\Admin\PoliciesTrait;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartsPolicy
{
    use HandlesAuthorization;
    use PoliciesTrait;

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

}
