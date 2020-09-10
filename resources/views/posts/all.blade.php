@extends('layouts.app')

@section('title', 'Posts')

@section('content')
  <h1>My posts</h1>
  @foreach ($posts as $post)
    <div>
      <a href="{{route('singlePost', ['id' => $post->id])}}">
        {{$post->title}}
      </a>
      -
      <a href="/users/{{$post->author->id}}">
        {{$post->author->name}}
      </a>
    </div>
  @endforeach

  {{ $posts->links() }}
  <br />
  {{ $posts->links('posts.custom-pagination', ['posts' => $posts]) }}
@endsection
