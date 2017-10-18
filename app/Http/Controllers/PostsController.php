<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // Create a new post using request data
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');

        // Save it to the database
        // $post->save();

        // Post::create([
        //     'title' => request('title'),
        //     'body'  => request('body')
        // ]);

        // Post::create(request()->all()); // dangerous

        $this->validate(request(), [
            // 'title' => 'required|max:10',
            'title' => 'required',
            'body'  => 'required'
        ]);

        Post::create(request(['title', 'body']));

        // And redirect to the homepage
        return redirect('/');
    }
}
