<?php

namespace App\Models\Admin;


use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

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
        return $this->hasMany('App\Models\Post');
    }
}
