<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'views',
        'user_id'
    ];

    protected $dates = [ 'deleted_at' ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag');
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }
}
