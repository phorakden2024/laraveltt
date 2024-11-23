<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;
    //relationship one to one with category
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    //relationship one to many with tag
    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('storage/'.$this -> thumbnail),
        );
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
