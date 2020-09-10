<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  public function show($id) {
    \DB::listen(function($query) {
      info($query->sql);
    });

    $user = User::with('publishedPosts.comments')->findOrFail($id);

    return view('users.single', compact('user'));
  }
}
