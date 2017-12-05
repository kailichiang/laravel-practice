<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Comment::class, function (Faker $faker) {
    static $user_id;
    static $post_id;

    return [
        'body' => $faker->text,
        'user_id' => $user_id ?: $user_id = 1,
        'post_id' => $post_id ?: $post_id = 1,
        'created_at' => Carbon::now()->subWeek(mt_rand(1,11)),
        'updated_at' => Carbon::now()->subWeek(mt_rand(1,11))
    ];
});
