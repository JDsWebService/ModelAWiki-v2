<?php

namespace App\Models\Admin;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use TimestampsTrait;

    protected $table = 'permissions';

    // Roles Relationship
    public function roles() {
        return $this->belongsToMany('App\Models\Admin\Role');
    }
}
