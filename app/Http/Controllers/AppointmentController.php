<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
  public function index()
  {
    $data = Appointment::latest()->paginate(20);

    return view('laravel-examples/today', ['data' => $data]);
  }
}
