<?php

use Faker\Generator as Faker;

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


$factory->define(App\Post::class, function (Faker $faker) {    
    $user_id = App\User::count() < 1 ? 
        factory(App\User::class)->create()->id :
        App\User::all()->random();

    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => $user_id,
    ];
});
