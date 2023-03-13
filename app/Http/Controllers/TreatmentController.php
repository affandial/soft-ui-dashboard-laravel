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
    // Log::channel('stderr')->info(json_decode(($patientId)));

    return view('laravel-examples/treatment', ['data' => $data, 'patientId' => $patientId, 'dentistId' => $dentistId]);
  }

  public function create()
  {
    $patientId = Patient::select(['id', 'name','phone_no'])
      ->orderBy('name', 'asc')
      ->get();
    $dentistId = Dentist::select(['id', 'name'])
      ->orderBy('name', 'asc')
      ->get();
    Log::channel('stderr')->info(count($patientId));

    return view('laravel-examples/add-treatment', ['patientId' => $patientId, 'dentistId' => $dentistId]);
  }

  public function  store(Request $request)
  {
    Log::channel('stderr')->info("Masek ke postentId");
    $data = request()->validate([
      'no_kwitansi'   => ['required'],
      'date'          => ['required', 'date'],
      'price'         => ['required', 'numeric'],
      'patient_id'    => ['required', 'numeric'],
      'dentist_id'    => ['required', 'numeric'],
      'type'          => ['required'],
      'description'   => ['required'],
    ]);

    try {
      Treatment::create($data);
    } catch (\Illuminate\Database\QueryException $e) {
      if ($e->errorInfo[1] == 1062) { // error code for duplicate entry
        return redirect()->back()->withErrors(['message' => ' No Kwintasi sudah ada, silahkan input kembali']);
      } else {
        return redirect()->back()->withErrors(['message' => 'Gagal Input data, harap periksa data yang ada inpu. Silahkan coba lagi.']);
      }
    }

    //redirect to
    return redirect()->back()->with('success', 'Daftar Penanganan Pasien Berhasil ditambahkan');
  }
}
