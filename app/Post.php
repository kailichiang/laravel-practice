<?php

namespace App;

use App\Comment;
use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        // Comment::class equals to '\App\Comment'
        return $this->hasMany(Comment::class);
    }

    public function user() // $comment->post->user->name;
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        // Comment::create([
        //     'body' => $body,
        //     'post_id' => $this->id,
        // ]);

        $this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters)
    {
        if( isset($filters['month'])
            && $month = $filters['month'] ) {
            // convert from May, Jan to number
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if( isset($filters['year'])
            && $year = $filters['year'] ) {
            $query->whereYear('created_at', $year);
        }
    }
}
