<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Patient;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TreatmentController extends Controller
{
  public function index()
  {
    $data = Treatment::latest()->paginate(20);
    $patientId = Patient::select(['id', 'name'])->get();
    $dentistId = Dentist::select(['id', 'name'])->get();

    return view('laravel-examples/treatment', ['data' => $data, 'patientId' => $patientId , 'dentistId' => $dentistId]);
  }

  public function create()
  {
    $patientId = Patient::select(['id', 'name'])->get();
    $dentistId = Dentist::select(['id', 'name'])->get();
    Log::channel('stderr')->info(count($patientId));

    return view('laravel-examples/add-treatment', [ 'patientId' => $patientId, 'dentistId' => $dentistId] );
  }

  public function  store(Request $request)
  {
    // $data = request()->validate([
    //   'name'      => ['required', 'min:4'],
    //   'phone_no'  => ['required', 'max:15'],
    //   'gender'    => ['required', 'max:6'],
    // ]);

    // Treatment::create([
    //   'name'      => $request['name'],
    //   'phone_no'  => $request['phone_no'],
    //   'email'     => $request['email'],
    //   'gender'    => $request['gender'],
    //   'address'   => $request['address'],
    //   'birthdate' => $request['birthdate'],
    // ]);

    //redirect to form add-patient
    return redirect('/add-patient')->with('success', 'Daftar Penanganan Pasien Berhasil ditambahkan');
  }
}
