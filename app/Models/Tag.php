<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //relationship one to many with post
    public function posts()
    {
        return $this->belongsToMany(post::class);
    }
}
