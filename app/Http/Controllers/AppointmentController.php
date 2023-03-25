<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class AppointmentController extends Controller
{
  public function index()
  {
    $data = Appointment::select('appointments.*', 'patients.name', 'patients.phone_no')
      ->join('patients', 'appointments.patient_id', '=', 'patients.id')
      ->where('date', '=', Appointment::raw('CURDATE()'))->orderBy('date', 'asc')->paginate(20);
    return view('laravel-examples/today', ['data' => $data]);
  }

  public function last()
  {
    // Log::channel('stderr')->info("test");

    $data = Appointment::select('appointments.*', 'patients.name', 'patients.phone_no')
      ->join('patients', 'appointments.patient_id', '=', 'patients.id')
      ->where('date', '<', now())
      ->orderBy('date', 'asc')
      ->paginate(20);
    return view('laravel-examples/last', ['data' => $data]);
  }

  public function next()
  {
    Log::channel('stderr')->info("error");
    $data = Appointment::select('appointments.*', 'patients.name', 'patients.phone_no')
      ->join('patients', 'appointments.patient_id', '=', 'patients.id')
      ->where('date', '>', now())
      ->orderBy('date', 'asc')
      ->paginate(20);
    return view('laravel-examples/next-temu', ['data' => $data]);
  }
  public function create()
  {
    $patientId = Patient::select(['id', 'name', 'phone_no'])->get();
    $dentistId = Dentist::select(['id', 'name'])->get();
    return view('laravel-examples/add-jadwal', ['patientId' => $patientId, 'dentistId' => $dentistId]);
  }


  public function update(Request $request)
  {
    $data = Appointment::findOrFail($request->id);

    try {
      $data->update([
        'status'      => $request->status
      ]);
    } catch (QueryException $e) {
      if ($e->errorInfo[1] == 1062) { // error code for duplicate entry
        return redirect()->back()->withErrors(['message' => 'Gagal ubah data pasien, Email / no telepon sudah terdaftar.']);
      } else {
        return redirect()->back()->withErrors(['message' => 'Gagal ubah data pasien, Harap periksa data yang ada input']);
      }
    }
    // return redirect()->away("https://wa.me/".$data->phone_no)->header('target', '_blank');
    return redirect()->back()->with(['success' => 'Jadwal berhasil di' . $request->status]);
  }
  public function store(Request $request)
  {
    Log::channel('stderr')->info("Parent :  Controller Store");
    $data = request()->validate([
      'patient_id'      => ['required'],
      'date'     => ['required', 'date', 'after_or_equal:today']
    ]);
    $data['status'] = 'pending';
    Appointment::create($data);
    return redirect()->back()->with(['success' => 'Jadwal berhasil di buat']);
  }
}
