<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;

use App\Comment;

class CommentsController extends Controller
{
  public function store(CreateCommentRequest $request, $id) {
    $data = $request->validated();

    // $comment = new Comment;
    // $comment->body = $data['comment'];
    // $comment->post_id = $id;

    // $comment->save();
    Comment::create([
      'body' => $data['comment'],
      'post_id' => $id
    ]);
    return redirect('/posts/'.$id);
  }
}
