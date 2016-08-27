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
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function getTagListAttribute()
    {
        return $this->tags->pluck('id')->toArray();
    }
}
