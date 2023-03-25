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
    $data = Treatment
      ::select('treatments.*', 'patients.name', 'patients.birthdate', 'patients.phone_no', 'dentists.name AS name_dentist')
      ->join('patients', 'treatments.patient_id', '=', 'patients.id')
      ->join('dentists', 'treatments.dentist_id', '=', 'dentists.id')
      ->orderBy('date', 'desc')->paginate(20);

    // Log::channel('stderr')->info(json_decode(($patientId)));

    return view('laravel-examples/treatment', ['data' => $data]);
  }

  public function create()
  {
    $patientId = Patient::select(['id', 'name', 'phone_no'])
      ->orderBy('name', 'asc')
      ->get();
    $dentistId = Dentist::select(['id', 'name'])
      ->orderBy('name', 'asc')
      ->get();

    return view('laravel-examples/add-treatment', ['patientId' => $patientId, 'dentistId' => $dentistId]);
  }

  public function  store(Request $request)
  {
    Log::channel('stderr')->info("Masek ke postentId");
    $data = request()->validate([
      'date'          => ['required', 'date'],
      'patient_id'    => ['required', 'numeric'],
      'dentist_id'    => ['required', 'numeric'],
      'subjective'    => ['required'],
      'objective'     => ['required'],
      'assessment'    => ['required'],
      'plan'          => ['required'],
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


  public function search(Request $request)
  {
    $names = $request->name;
    if (is_null($request->name) && is_null($request->birthdate)) {
      Log::channel('stderr')->info("Lewat doang");
      return redirect('treatment');
    }
    if ($request->name && $request->birthdate) {
      $data = Treatment::select('treatments.*', 'patients.name', 'patients.birthdate', 'patients.phone_no', 'dentists.name AS name_dentist')
        ->leftjoin('dentists', 'treatments.dentist_id', '=', 'dentists.id')
        ->leftJoin('patients', 'treatments.patient_id', '=', 'patients.id')
        ->whereIn('patients.id', function ($query) use ($request) {
          $query->select('id')
            ->from('patients')
            ->where('name', 'LIKE', "%{$request->name}%");
        })
        ->where('treatments.date', $request->birthdate)
        ->paginate(20);
    } elseif ($request->name) {
      $query = Treatment::select('treatments.*', 'patients.name', 'patients.birthdate', 'patients.phone_no', 'dentists.name AS name_dentist')
        ->leftJoin('dentists', 'treatments.dentist_id', '=', 'dentists.id')
        ->leftJoin('patients', 'treatments.patient_id', '=', 'patients.id')
        ->whereIn('treatments.patient_id', function ($query) use ($request) {
          $query->select('id')
            ->from('patients')
            ->where('name', 'LIKE', "%{$request->name}%");
        })->paginate(20);
    } elseif ($request->birthdate) {
      $query = Treatment::select('treatments.*', 'patients.name', 'patients.birthdate', 'patients.phone_no', 'dentists.name AS name_dentist')
        ->leftjoin('dentists', 'treatments.dentist_id', '=', 'dentists.id')
        ->leftJoin('patients', 'treatments.patient_id', '=', 'patients.id')
        ->where('treatments.date', $request->birthdate)
        ->paginate(20);
    }
    return view('laravel-examples/treatment', ['data' => $query]);
  }
}
