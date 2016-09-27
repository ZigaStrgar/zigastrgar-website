<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZigaStrgar\Orderable\Orderable;

class Post extends Model
{
    use Sluggable;
    use SoftDeletes;
    use Orderable;

    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'slug',
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    public function getTagListAttribute()
    {
        return $this->tags->pluck('id')->toArray();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function orderable()
    {
        return [ 'created_at' => 'DESC' ];
    }
}
