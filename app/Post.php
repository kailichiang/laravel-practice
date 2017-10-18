<?php

namespace App;

class Post extends Model
{
    public function comments()
    {
        // Comment::class equals to '\App\Comment'
        return $this->hasMany(Comment::class);
    }
}
