@extends('layouts.master')


@section('content')
    <div class="col-sm-8 blog-main">
        <h1>{{ $post->title }}</h1>
        
        {{ $post->body }}

        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach( $post->comments as $comment )
                    <article>
                        <li class="list-group-item">
                            <strong>
                                {{ $comment->created_at->diffForHumans() }}: &nbsp;
                            </strong>
                            {{ $comment->body }}
                        </li>
                    </article>
                @endforeach
            </ul>
        </div>

        {{-- Add a comment --}}
        <hr>

        <div class="card">
            <div class="card-block">
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    {{-- {{ method_field('PATCH') }} --}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" id="" placeholder="Your comment here." class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>


                </form>

                @include('layouts.errors')
            </div>
        </div>

    </div>
@endsection