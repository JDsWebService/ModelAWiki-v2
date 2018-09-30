<?php

namespace App\Models\Forum;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumReply extends Model
{
    use TimestampsTrait;
    use SoftDeletes;

    protected $table = 'forum_replies';

    // Define User Relationship
    public function user() {
    	return $this->belongsTo('App\Models\User\User');
    }

    // Define Post Relationship
    public function post() {
    	return $this->belongsTo('App\Models\Forum\ForumPost');
    }

    // Define Support Messages Relationship
    public function supportMessages() {
        return $this->hasMany('App\Models\Support\Message', 'reply_id');
    }
}
