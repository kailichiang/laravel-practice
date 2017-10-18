<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // protect against mass assignment
    // protected $fillable = ['title', 'body'];
    // protected $guarded = ['user_id'];
    protected $guarded = []; // don't guard anything
}
