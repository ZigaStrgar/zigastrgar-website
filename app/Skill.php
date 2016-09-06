<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

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
