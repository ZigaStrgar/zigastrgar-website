<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('oreder', function(Builder $builder) {
            return $builder->orderBy('created_at', 'DESC');
        });
    }

    protected $fillable = [
        'content',
        'post_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
