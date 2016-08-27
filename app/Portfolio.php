<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'content',
        'features',
        'link'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class)->where('type', 'portfolio')->get();
    }
}
