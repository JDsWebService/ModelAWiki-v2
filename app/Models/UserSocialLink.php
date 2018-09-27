<?php

namespace App\Models;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class UserSocialLink extends Model
{
	use TimestampsTrait;
	
    // Define the Table being used
    protected $table = 'user_social_links';

    // Define User Relationship
 	public function user() {
		return $this->belongsTo('App\Models\User\User');
	}

	// Define Admin Relationship
    public function admin() {
		return $this->belongsTo('App\Models\Admin\Admin');
	}
}
