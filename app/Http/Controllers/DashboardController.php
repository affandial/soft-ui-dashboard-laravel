<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Dentist;
use App\Models\Appointment;
use App\Models\Treatment;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      $patient = Patient::all()->count();
      $dentist = Dentist::all()->count();
      $confirmed = Appointment::where('status','=','confirm')->count();
      $canceled = Appointment::where('status','=','cancel')->count();
      $treatment = Treatment::all()->count();


      return view('dashboard', ['patient' => $patient,'dentist' => $dentist,'confirmed' => $confirmed,'canceled' => $canceled,'treatment'=>$treatment]);
    }
  
}
