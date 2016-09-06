<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;

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
        'mobile'
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'resource_id', 'id');
    }

    public function getImagePathAttribute()
    {
        if ( is_null($this->image) ) {
            return "";
        }

        $image = $this->image->where('resource', 'portfolio')->where('resource_id', $this->id)->first();
        $path  = $image->path;
        $path  = explode("/", $path);
        $path  = end($path);

        return $path;
    }
}
