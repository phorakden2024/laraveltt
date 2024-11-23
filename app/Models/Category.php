<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relationship one to one with post
    public function posts()
    {
        return $this->hasMany(post::class);
    }
}

