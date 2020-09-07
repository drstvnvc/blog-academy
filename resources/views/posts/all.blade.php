@extends('layouts.app')

@section('title', 'Posts')

@section('content')
  <h1>My posts</h1>
  @foreach ($posts as $post)
    <div>
      <a href="{{route('singlePost', ['id' => $post->id])}}">{{$post->title}} ({{$post->comments->count()}})</a>
    </div>
  @endforeach
@endsection
