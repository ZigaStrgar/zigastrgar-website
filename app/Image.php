<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'resource_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function post()
    {
        return $this->hasOne('App\Post');
    }

    public function comment()
    {
        return $this->hasOne('App\Comment');
    }
}
