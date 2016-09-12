<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ZigaStrgar\Orderable\Orderable;

class Comment extends Model
{
    use SoftDeletes;
    use Orderable;

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

    public function orderable()
    {
        return [ 'created_at' => 'DESC' ];
    }
}
