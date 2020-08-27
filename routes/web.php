<?php

use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/posts', function () {
  $posts = Post::all();
  // $results = select * from posts;
  // $results = array_map(function ($item) {return new Post($item);})

  return view('posts', ['posts' => $posts]);
});

Route::get('/posts/{id}', function ($id) {
  // select * from posts where id=$id;
  $post = Post::findOrFail($id);

  return view('post', [
    'title' => $post->title,
    'body' => $post->body
  ]);
})->name('singlePost');
