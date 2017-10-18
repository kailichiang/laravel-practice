<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // public static function incomplete()
    // {
    //     return static::where('completed', 0)->get();
    // }

    // Task::incomplete();
    // Task::incomplete()->where('id', '>=', 2)->get();
    public function scopeIncomplete($query) 
    {
        return $query->where('completed', 0);
    }

}
