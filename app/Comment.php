<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'post_id',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function post()
    {
        return $this->hasOne('App\Post');
    }
}
