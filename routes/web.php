<?php

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');


Route::get('/', 'PostsController@index');
// Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');

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