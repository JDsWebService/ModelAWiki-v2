<?php

namespace App\Models\Admin;


use App\Notifications\AdminResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
    * Indicates if the guard should be used.
    *
    * @var string
    */
    protected $guard = 'admin';

    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
    public $timestamps = true;

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

    /**
    * Carbon date setup
    *
    * @return array
    */
    public function getDates()
    {
       return ['created_at', 'updated_at'];
    }

    /**
    * Created at accessor
    *
    * @param $date
    * @return string
    */
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    /**
    * Updated at accessor
    *
    * @param $date
    * @return string
    */
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

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
        return $this->hasMany('App\Models\Post');
    }

    // Role Relationship
    public function roles() {
        return $this->belongsToMany('App\Models\Admin\Role');
    }
}
