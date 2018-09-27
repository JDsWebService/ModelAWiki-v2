<?php

namespace App\Models\Admin;


use App\Notifications\AdminResetPasswordNotification;
use App\Traits\TimestampsTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    use TimestampsTrait;

    /**
    * Indicates if the guard should be used.
    *
    * @var string
    */
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
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

    /**
    * Created at accessor
    *
    * @param $date
    * @return string
    */
    public function getActiveAttribute()
    {   
        if($this->attributes['active']) {
            return "<span class='badge badge-success'>Active</span>";
        }
        return "<span class='badge badge-danger'>Deactivated</span>";
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    // Post Relationship
    public function posts() {
        return $this->hasMany('App\Models\Blog\Post', 'user_id');
    }

    // Role Relationship
    public function roles() {
        return $this->belongsToMany('App\Models\Admin\Role');
    }

    // Posts Relationship
    public function socialLinks() {
        return $this->hasMany('App\Models\UserSocialLink', 'admin_id');
    }
}
