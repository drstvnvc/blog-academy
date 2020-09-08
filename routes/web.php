<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
  Route::get('/posts', 'PostsController@index');
  Route::get('/posts/create', 'PostsController@create')
    ->name('createPostForm');
  Route::post('/posts', 'PostsController@store');
  Route::get('/posts/{id}', 'PostsController@show')
    ->name('singlePost');
  Route::post('/posts/{id}/comments', 'CommentsController@store');

  Route::post('/logout', 'AuthController@logout')->name('logout');

  Route::get('users/{id}', 'UsersController@show');

  Route::get('/', function () {
    return redirect('/posts');
  });
});

Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', 'AuthController@getRegisterForm')->name('register');
  Route::post('/users', 'AuthController@register');

  Route::get('/login', 'AuthController@getLoginForm')->name('login');
  Route::post('/login', 'AuthController@login');
});
