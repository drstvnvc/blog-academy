@extends('layouts.app')
@section('title', 'Register')

@section('content')
  <div class="alert alert-secondary">
    <form method="POST" action="/login">
      @csrf
      <div class="form-group">
        <label for="email">Email address</label>
        <input
          type="email"
          class="form-control"
          id="email"
          name="email"
        />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input 
          type="password"
          class="form-control"
          id="password"
          name="password"
        />
      </div>

      @if($loginFailed ?? false)
        <div class="alert alert-danger">
          Email or password are incorrect
        </div>
      @endif

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
@endsection