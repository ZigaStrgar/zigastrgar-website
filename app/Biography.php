<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biography extends Model
{
    use SoftDeletes, Attachable;

    protected $fillable = [
        'title',
        'subtitle',
        'date',
        'content',
        'type'
    ];
}
