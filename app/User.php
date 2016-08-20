<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function(User $user) {
            if ( $user->email == "ziga_strgar@hotmail.com" ) {
                $user->type = 'admin';
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function isAdmin()
    {
        return $this->type == "admin";
    }
}
