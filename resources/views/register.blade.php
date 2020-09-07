@extends('layouts.app')
@section('title', 'Register')

@section('content')
  <div class="alert alert-secondary">
    <form method="POST" action="/users">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input
          class="form-control @error('name') is-invalid @enderror"
          id="name"
          name="name"
        />
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email address</label>
        <input
          type="email"
          class="form-control @error('email') is-invalid @enderror"
          id="email"
          name="email"
        />
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input 
          type="password"
          class="form-control @error('password') is-invalid @enderror"
          id="password"
          name="password"
        />
        @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="confirm_password">Confirm password</label>
        <input 
          type="password"
          class="form-control @error('confirm_password') is-invalid @enderror"
          id="confirm_password"
          name="confirm_password"
        />
        @error('confirm_password')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="agreed" name="agreed" value="1">
        <label class="form-check-label" for="agreed">I agree to Terms and conditions!</label>
        @error('agreed')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
@endsection