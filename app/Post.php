<?php

namespace App;

use App\Comment;

class Post extends Model
{
    public function comments()
    {
        // Comment::class equals to '\App\Comment'
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id,
        // ]);

        $this->comments()->create(compact('body'));
    }
}
