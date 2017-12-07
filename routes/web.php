<?php

// $stripe = App::make('App\Billing\Stripe');
// $stripe = resolve('App\Billing\Stripe');
// $stripe = app('App\Billing\Stripe');
// $stripe2 = app('App\Billing\Stripe');
// $stripe3 = app('App\Billing\Stripe'); 
// If using singleton, they all get the same instance;


// App::instance('App\Billing\Stripe', $stripe);

// dd($stripe);
// dd(resolve('App\Billing\Stripe'));

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');


Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy'); // better to be POST

/**
 *  POSTS actions and resources
 *  
 *  GET /posts
 *  GET /posts/create
 *  POST /posts
 *  GET /posts/{id}/edit
 *  GET /posts/{id}
 *  PATCH /posts/{id}
 *  DELETE /posts/{id}
 */

// controller => PostsController
// model => Post
// migration => create_posts_table