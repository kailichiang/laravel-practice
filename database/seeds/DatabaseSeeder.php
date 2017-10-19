<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Post::class, 3)->create()->each(function ($p) {
            $p->comments()->save(factory(App\Comment::class)->make());
        });
    }
}
