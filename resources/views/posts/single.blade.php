@extends('layouts.app')
@section('title', $title)

@section('content')
  <h1>{{$title}}</h1>
  <p>{{$body}}</p>
  <hr />
  <div>
    <h3>Comments</h3>
    @foreach($comments as $comment)
      <div class="alert alert-primary">
        {{$comment->body}}
      </div>
    @endforeach
    <div>
      <form method="POST" action="/posts/{{$id}}/comments">
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
