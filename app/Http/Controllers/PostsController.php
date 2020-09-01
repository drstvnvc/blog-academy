<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $publishedPosts = Post::published()
      ->with('comments')
      ->orderBy('title', 'asc')
      ->get();

    // $posts = Post::where('is_published', 1)->orderBy('title', 'asc')->get();
    // $unpublishedPosts = Post::unpublished()->get();
    // select + from posts where is_published = 1 order by name asc;
    return view('posts.all', ['posts' => $publishedPosts]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // select * from posts where id=$id;
    $post = Post::findOrFail($id);
    // $comments = Comment::where('post_id', $id)->get();
    // select * from comments where post_id= $id

    return view('posts.single', [
      'title' => $post->title,
      'body' => $post->body,
      'comments' => $post->comments
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('posts.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreatePostRequest $request)
  {
    $data = $request->validate();

    // $newPost = new Post;
    // $newPost->title = $data['title'];
    // $newPost->body = $data['body'];
    // $newPost->is_published = $request->get('is_published', false);

    // $newPost->save();

    $newPost = Post::create($data);
    // insert into posts (title, body, is_published)
    // values ($data['title'], $data['body'], $data['is_published'])

    return $this->index();
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
