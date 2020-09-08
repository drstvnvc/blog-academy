@extends('layouts.app')

@section('title', $user->name . ' - Profile page');

@section('content')
  <h1>{{$user->name}}</h1>
  <h4>Posts</h4>

  @foreach ($user->publishedPosts as $post)
    <div>
      <a href="{{route('singlePost', ['id' => $post->id])}}">
        {{$post->title}} ({{ $post->comments->count() }})
      </a>
    </div>
  @endforeach
@endsection