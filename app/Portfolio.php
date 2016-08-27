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
        return $this->hasOne('App\Image')->where('type', 'portfolio')->get();
    }
}
