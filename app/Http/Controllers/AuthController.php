<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\RegisterRequest;
use App\User;

class AuthController extends Controller
{
  public function getRegisterForm()
  {
    return view('register');
  }

  public function register(RegisterRequest $request)
  {
    $data = $request->validated();

    $user = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']) // bcrypt($data['password'])
    ]);

    auth()->login($user);

    return redirect('/posts');
  }
}
