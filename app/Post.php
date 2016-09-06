<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Sluggable;
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('latest', function(Builder $query) {
            return $query->orderBy('created_at', 'DESC');
        });
    }

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
}
