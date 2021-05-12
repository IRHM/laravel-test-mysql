<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as Controller;

class LoginController extends Controller {

  public function login(Request $request)
  {
    $validator = $request->validate([
      'email' => 'required|email',
      'password' => 'required|alphaNum|min:8'
    ]);

    // Not hooking up to database, just accepting everyone with 'email' cookie set.
    return redirect()->intended('/')->withCookie(cookie('email', $request->input('email')));
  }
}