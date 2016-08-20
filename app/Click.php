<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [ 'ip', 'agent', 'user_id' ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
