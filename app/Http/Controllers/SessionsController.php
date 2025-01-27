<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\statusklinik;


class SessionsController extends Controller
{
  public function create()
  {
    return view('session.login-session');
  }

  public function store()
  {
    $attributes = request()->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::attempt($attributes)) {
      session()->regenerate();
      $status = statusklinik::find(1);
      if ($status['status'] == 'open') {
        return redirect('dashboard')->with(['success' => 'You are logged in.']);
      } else {
        return redirect('dashboard')->with(['success' => 'You are logged in.', 'status'=>'closed']);
      }
    } else {

      return back()->withErrors(['email' => 'Email or password invalid.']);
    }
  }

  public function destroy()
  {

    Auth::logout();

    return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
  }
}
