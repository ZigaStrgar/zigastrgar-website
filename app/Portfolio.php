<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function(Builder $builder) {
            return $builder->getQuery()->orderBy('created_at', 'DESC');
        });
    }

    protected $fillable = [
        'title',
        'content',
        'features',
        'link',
        'git',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'resource_id', 'id');
    }

    public function getImagePathAttribute()
    {
        $path = $this->image->where('resource', 'portfolio')->where('resource_id', $this->id)->first()->path;
        $path = explode("/", $path);

        return end($path);
    }
}
