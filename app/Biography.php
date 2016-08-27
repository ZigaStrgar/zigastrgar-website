<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'date',
        'content',
        'type'
    ];
}
