<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
  public function index()
  {
    $data = Patient::latest()->paginate(20);
    return view('laravel-examples/data-patient', ['data' => $data]);
  }

  public function create()
  {
    return view('laravel-examples/add-patient');
  }

  public function  store(Request $request)
  {
    $data = request()->validate([
      'name'      => ['required','min:4'],
      'phone_no'  => ['required','max:15'],
      'gender'    => ['required','max:6'],
    ]);

    Patient::create([
      'name'      => $request['name'],
      'phone_no'  => $request['phone_no'],
      'email'     => $request['email'],
      'gender'    => $request['gender'],
      'address'   => $request['address'],
      'birthdate' => $request['birthdate'],
    ]);

    //redirect to form add-patient
    return redirect('/add-patient')->with('success', 'Data Pasien Berhasil diinput');
  }
}

