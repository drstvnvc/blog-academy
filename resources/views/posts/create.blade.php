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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control " id="title" name="title">
      @if($errors->first('title'))
        <div class="alert alert-danger">
          {{$errors->first('title')}}
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" rows="3" name="body"></textarea>
      @if($errors->first('body'))
        <div class="alert alert-danger">
          {{$errors->first('body')}}
        </div>
      @endif
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1">
      <label class="form-check-label" for="is_published">I want to publish the post</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>


@endsection