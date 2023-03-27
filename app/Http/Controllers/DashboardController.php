<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Dentist;
use App\Models\Appointment;
use App\Models\statusklinik;
use App\Models\Treatment;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function info()
  {
    $status = statusklinik::find(1);

    // $data = [
    //   'status' => $status->status,
    // ];
    return response()->json($status->status);
  }

  public function tutup()
  {
    $status = statusklinik::find(1);
    $status->update([
      'status'      => 'closed'
    ]);

    return response()->json(['Message'=>'Berhasil Tutup Toko', 'Status'=>$status->status]);
  }

  public function open_klinik()
  {
    $status = statusklinik::find(1);
    $status->update([
      'status'      => 'open'
    ]);
    return redirect()->back();
  }

  public function close_klinik()
  {
    $status = statusklinik::find(1);
    $status->update([
      'status'      => 'closed'
    ]);
    return redirect()->back();
  }

  public function index($status = null)
  {
    $patient = Patient::all()->count();
    $dentist = Dentist::all()->count();
    $confirmed = Appointment::where('status', '=', 'confirm')->count();
    $canceled = Appointment::where('status', '=', 'cancel')->count();
    $treatment = Treatment::all()->count();
    $statusklinik = statusklinik::find(1);

    if ($status == 'closed') {
      return view('dashboard', ['statusklinik'=>$statusklinik,'status' => 'closed', 'patient' => $patient, 'dentist' => $dentist, 'confirmed' => $confirmed, 'canceled' => $canceled, 'treatment' => $treatment]);
    }

    return view('dashboard', ['statusklinik' => $statusklinik, 'patient' => $patient, 'dentist' => $dentist, 'confirmed' => $confirmed, 'canceled' => $canceled, 'treatment' => $treatment]);
  }

  public function update(Request $request)
  {


    $status = statusklinik::find(1);
    Log::channel('stderr')->info("Masuk ke posting,reqguestnya " . $request->status ." ini didb".$status['status']);
    if ($status['status'] == $request->status) {
      return redirect()->back();
    } else {
      $status->update(['status' => $request->status]);
      return   redirect()->back();
    }
  }
}
