<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'address',
        'age',
        'country',
        'nationality',
        'cover_letter',
        'image_cover',
        'image',
        'type',
        'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function education(){
        return $this->hasMany('App\Education');
    }

    public function cv(){
        return $this->hasOne('App\Resume', 'user_id');
    }

    public function skills(){
        return $this->hasMany('App\Skill');
    }

    public function experiences(){
        return $this->hasMany('App\Experience');
    }

    public function permissions(){
        return $this->hasMany('App\Permission');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket', 'user_id');
    }

    public function portfolio(){
        return $this->hasMany('App\Portfolio', 'userId');
    }
}
