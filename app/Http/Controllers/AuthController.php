<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\RegisterRequest;
use App\User;
use App\Mail\AccountConfirmation;
use Carbon\Carbon;

class AuthController extends Controller
{
  public function getRegisterForm()
  {
    return view('register');
  }

  public function getLoginForm() {
    return view('login');
  }

  public function register(RegisterRequest $request)
  {
    $data = $request->validated();

    $user = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']) // bcrypt($data['password'])
    ]);

    Mail::to($user)->send(new AccountConfirmation($user));

    auth()->login($user);

    return redirect('/posts');
  }

  public function login(Request $request) {
    $credentials = [
      'email' => $request->get('email'),
      'password' => $request->get('password')
    ];
    // $user = User::where('email', $email)->first();
    // if ($user && $user->password == $password) { // provjera passworda preko hasha

    // if (User::where('email', $credentials['email'])->first()->email_verified_at == null) {
    //   return view('not-verified');
    // }
    if (auth()->attempt($credentials)) {
      return redirect('/posts');
    }

    return view('login', ['loginFailed' => true]);
  }

  public function logout() {
    auth()->logout();
    return redirect('/');
  }

  public function verifyUser($id)
  {
    $user = User::findOrFail($id);

    $user->email_verified_at = new Carbon;
    $user->save();
    // $user->update([
    //   'email_verified_at' => '13123'
    // ]);
    return redirect('/posts');
  }
}
