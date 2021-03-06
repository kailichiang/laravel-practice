<?php

namespace App\Http\Controllers;

use App\Repositories\Posts;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['create']);
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
        // $posts = Post::latest();

        // if( $month = request('month') ) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month); // convert from May, Jan...
        // }

        // if( $year = request('year') ) {
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();

        // $posts = Post::latest()
        //     ->filter(request(['month', 'year']))
        //     ->get();

        // $posts = (new \App\Repositories\Posts)->all();
        $posts = $posts->all();

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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has been published.');

        // And redirect to the homepage
        return redirect('/');
    }
}
