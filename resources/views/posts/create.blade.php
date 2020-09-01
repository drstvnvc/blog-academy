@extends('layouts.app')
@section('title', 'Create post')

@section('content')
    {{--
      input - title
      textarea - body
      checkbox - is_published
    --}}

  <form method="POST" action="/posts">
    @csrf
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control @error('title') is-invalid @enderror" id="title" name="title">
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control @error('body') is-invalid @enderror" id="body" rows="3" name="body"></textarea>
      @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1">
      <label class="form-check-label" for="is_published">I want to publish the post</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>


@endsection