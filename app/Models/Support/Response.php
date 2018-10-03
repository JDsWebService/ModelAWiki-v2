<?php

namespace App\Models\Support;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
	use TimestampsTrait;

	protected $table = 'support_responses';

	// Define User Relationship
	public function user() {
		return $this->belongsTo('App\Models\User\User');
	}

	// Define Admin Relationship
	public function admin() {
		return $this->belongsTo('App\Models\Admin\Admin');
	}
}
