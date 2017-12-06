<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;
use Carbon\Carbon;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('The Bootstrap Blog');
    }    
    
    /**
     * Test archive
     *
     * @return void
     */
   public function testArchive()
   {
       // Give I have 2 records in the database that are posts.
       // and each one is posted a month apart.
       $first = factory(Post::class)->create();
       $second = factory(Post::class)->create([
           'created_at' => Carbon::now()->subMonth()
       ]);

       // When I fetch the archives.
       $posts = Post::archives();

       // Then the response should be in the proper format
       $this->assertCount(2, $posts);
       $this->assertEquals([
           [
               "year" => $first->created_at->format('Y'),
               "month" => $first->created_at->format('F'),
               "published" => 1
           ],
           [
               "year" => $second->created_at->format('Y'),
               "month" => $second->created_at->format('F'),
               "published" => 1
           ],
       ], $posts);
   }
}
