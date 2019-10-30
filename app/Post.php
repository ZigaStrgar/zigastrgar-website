<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZigaStrgar\Orderable\Orderable;

class Post extends Model
{
    use Sluggable;
    use SoftDeletes;
    use Orderable;
    use Attachable;

    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'slug',
        'user_id',
        'publish_at'
    ];

    protected $dates = [ 'deleted_at', 'publish_at', 'created_at', 'updated_at' ];

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

    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public function setPublishAtAttribute($date)
    {
        $this->attributes['publish_at'] = Carbon::parse($date);
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

    public function scopePublished($query)
    {
        return $query->where('publish_at', '<=', Carbon::now());
    }
}
