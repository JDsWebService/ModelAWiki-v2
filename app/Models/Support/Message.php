<?php

namespace App\Models\Support;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use TimestampsTrait;

    protected $table = 'support_messages';

    // Define User Relationship
    public function user() {
    	return $this->belongsTo('App\Models\User\User');
    }
}
