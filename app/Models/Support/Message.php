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

    // Define Forum Post Relationship
    public function post() {
    	return $this->belongsTo('App\Models\Forum\ForumPost');
    }

    // Define Forum Reply Relationship
    public function reply() {
    	return $this->belongsTo('App\Models\Forum\ForumReply');
    }
}
