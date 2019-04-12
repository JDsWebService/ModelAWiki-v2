<?php

namespace App\Models\User;

use App\Traits\TimestampsTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use TimestampsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Get Full Name
    public function getFullNameAttribute() {
        return $full_name = $this->first_name . ' ' . $this->last_name;
    }

    // Social Media Links Relationship
    public function socialLinks() {
        return $this->hasMany('App\Models\UserSocialLink', 'user_id');
    }

    // Define Forum Posts Relationship
    public function posts() {
        return $this->hasMany('App\Models\Forum\ForumPost', 'user_id');
    }

    // Define Forum Replies Relationship
    public function replies() {
        return $this->hasMany('App\Models\Forum\ForumReply', 'user_id');
    }

    // Define Support Message Relationship
    public function supportMessages() {
        return $this->hasMany('App\Models\Support\Message', 'user_id');
    }

    // Define Support Response Relationship
    public function supportResponse() {
        return $this->hasMany('App\Models\Support\Response', 'user_id');
    }

    // Define Parts Images Model
    public function partsImages() {
        return $this->hasMany('App\Models\Parts\Image', 'user_id');
    }
}
