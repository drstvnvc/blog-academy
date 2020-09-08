@extends('layouts.app')
@section('title', $post->title)

@section('content')
  <h1>{{$post->title}}</h1>
  <a href="/users/{{$post->author->id}}">
    <h4>{{$post->author->name}}</h4>
  </a>
  <p>{{$post->body}}</p>
  <hr />
  <div>
    <h3>Comments</h3>
    @foreach($post->comments as $comment)
      <div class="alert alert-primary">
        {{$comment->body}}
      </div>
    @endforeach
    <div>
      <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf
        <div class="form-group">
          <input class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" placeholder="Comment..."/>
          @error('comment')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <button class="btn btn-primary" type="submit">Post comment</button>
      </form>
    </div>
  </div>
@endsection
