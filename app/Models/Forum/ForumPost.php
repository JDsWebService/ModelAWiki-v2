<?php

namespace App\Models\Forum;

use App\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumPost extends Model
{
    use TimestampsTrait;
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Define the Table being Used
    protected $table = 'forum_posts';

    // Define Category Relationship
    public function category() {
    	return $this->belongsTo('App\Models\Forum\ForumCategory');
    }

    // Define Users Relationship
    public function user() {
    	return $this->belongsTo('App\Models\User\User');
    }

    // Define Admins Relationship
    public function admin() {
        return $this->belongsTo('App\Models\Admin\Admin');
    }

    // Define Forum Replies Relationship
    public function replies() {
        return $this->hasMany('App\Models\Forum\ForumReply', 'post_id');
    }

    // Define Support Messages Relationship
    public function supportMessages() {
        return $this->hasMany('App\Models\Support\Message', 'post_id');
    }
}
