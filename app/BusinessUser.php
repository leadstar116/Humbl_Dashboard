<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BusinessUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'business';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password_hash', 'auth_key', 'password_reset_token', 'FirstName', 'LastName',
        'BusinessName', 'TagLine', 'ProfilePic',
        'ProfilePic_back', 'address', 'city', 'country', 'state', 'zipcode', 'biz_description',
        'profile_completed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_hash'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function departments()
    {
        return $this->hasMany('App\Departments');
    }

    public function invites()
    {
        return $this->hasMany('App\Invites');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function employees()
    {
        return $this->hasManyThrough('App\Users', 'App\Departments');
    }
 /*
    public function notification()
    {
        return $this->hasOne('App\NotificationSetting');
    }
    */
    public function getAuthPassword()
    {
      return $this->password_hash;
    }
}
