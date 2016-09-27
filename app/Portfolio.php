<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZigaStrgar\Orderable\Orderable;

class Portfolio extends Model
{
    use SoftDeletes;
    use Orderable;

    protected $fillable = [
        'title',
        'content',
        'features',
        'link',
        'git',
        'mobile',
        'landscape',
        'order'
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

    public function orderable()
    {
        return [
            'order'      => 'DESC',
            'created_at' => 'DESC'
        ];
    }
}
