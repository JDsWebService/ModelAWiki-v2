<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use App\Traits\Admin\PoliciesTrait;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserManagementPolicy
{
    use HandlesAuthorization;
    use PoliciesTrait;

    /**
     * Determine whether the user can access User Management.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function global($admin)
    {
        return $this->userHasAccess('user-global', $admin);
    }

}
