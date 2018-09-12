<?php

namespace App\Models\Admin;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use TimestampsTrait;
    
    // Admin User Relationship
    public function users() {
    	return $this->belongsToMany('App\Models\Admin\Admin');
    }

    // Permissions Relationship
    public function permissions() {
        return $this->belongsToMany('App\Models\Admin\Permission');
    }
}
