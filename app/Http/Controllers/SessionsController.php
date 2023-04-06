<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\statusklinik;
use Exception;
use Illuminate\Support\Facades\Log;




class SessionsController extends Controller
{
  public function create()
  {
    return view('session.login-session');
  }

  public function store()
  {
    try {
      $attributes = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
      ]);

      if (Auth::guard('teacher')->attempt($attributes)) {
        Log::channel('stderr')->info("masuk ke table teacher");
        session()->regenerate();
        $status = statusklinik::find(1);
        if ($status['status'] == 'open') {
          return redirect('test')->with(['success' => 'You are logged in.']);
        } else {
          return redirect('test')->with(['success' => 'You are logged in.', 'status' => 'closed']);
        }
      }

      if (Auth::guard('web')->attempt($attributes)) {
        Log::channel('stderr')->info("masuk ke table users");
        session()->regenerate();
        $status = statusklinik::find(1);
        if ($status['status'] == 'open') {
          return redirect('dashboard')->with(['success' => 'You are logged in.']);
        } else {
          return redirect('dashboard')->with(['success' => 'You are logged in.', 'status' => 'closed']);
        }
      }
      return back()->withErrors(['email' => 'Email or password invalid.']);}
      catch (Exception $e) {
      //create maintenance.blade.php to view maintenance
      return view('maintenance');
    }



  }

  public function destroy()
  {
    Auth::logout();
    return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
  }

}
