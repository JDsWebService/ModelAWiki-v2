<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use App\Traits\Admin\PoliciesTrait;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminManagementPolicy
{
    use HandlesAuthorization;
    use PoliciesTrait;

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

}
