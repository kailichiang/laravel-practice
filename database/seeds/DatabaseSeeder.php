<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        $tagsCount = 5;
    
        // $this->call(UsersTableSeeder::class);
        $users = factory(App\User::class, $usersCount)->create();
        $posts = factory(App\Post::class, $postsCount)->create()
            ->each(function($p) {
                $p->updated_at = $p->created_at = Carbon::now()->subWeek(mt_rand(1,11));
                $p->save();
            });
        $comments = factory(App\Comment::class, $commentsCount)->create()
            ->each(function ($c) {
                $c->updated_at = $c->created_at = Carbon::now()->subWeek(mt_rand(1,11));;
                $c->save();
            });
        $tags = factory(App\Tag::class, $tagsCount)->create()
            ->each(function ($t) use($posts) {
                $t->posts()->attach($posts->random());
            });
    }
}
