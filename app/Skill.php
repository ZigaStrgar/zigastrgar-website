<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'percentage',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
