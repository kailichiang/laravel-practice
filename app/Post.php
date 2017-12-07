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

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()->toArray();
    }

    public function tags()
    {
        // Any post may have many tags
        // Any tag may be applied to many posts
        return $this->belongsToMany(Tag::class);
    }
}
