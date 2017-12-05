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
        $usersCount = 3;
        $postsCount = 10;
        $commentsCount = 15;
    
        // $this->call(UsersTableSeeder::class);
        $users = factory(App\User::class, $usersCount)->create();
        $posts = factory(App\Post::class, $postsCount)->create()
            ->each(function($p) use ($users) {
                $p->user_id = $users->random()->id;
                $p->save();
            });
        $comments = factory(App\Comment::class, $commentsCount)->create()
            ->each(function ($c) use ($posts, $users) {
                $c->user_id = $users->random()->id;
                $c->post_id = $posts->random()->id;
                $c->save();
        });
    }
}
