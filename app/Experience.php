<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'date',
        'content',
        'type'
    ];
}
