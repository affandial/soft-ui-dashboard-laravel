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
  public function this_year()
  {
    try {
      $data = Treatment::select(Treatment::raw("DATE_FORMAT(date, '%m') AS bulan, COALESCE(COUNT(*), 0) AS total"))
        ->where('date', '>=', '2023-01-01')
        ->where('date', '<', Treatment::raw("DATE_FORMAT(NOW(), '%Y-%m-01')"))
        ->groupBy(Treatment::raw("DATE_FORMAT(date, '%m')"))
        ->get();
      $data_cancel = Appointment::select(Appointment::raw("DATE_FORMAT(date, '%m') AS bulan, COALESCE(COUNT(*), 0) AS total"))
      ->where('date', '>=', '2023-01-01')
      ->where('date', '<', Appointment::raw("DATE_FORMAT(NOW(), '%Y-%m-01')"))
      ->where('status','=','cancel')
      ->groupBy(Appointment::raw("DATE_FORMAT(date, '%m')"))
      ->get();
      return  response()->json(['data' => $data, 'data_cancel'=>$data_cancel], 200);
    } catch (\Exception $e) {
      return response()->json(['data' => $e->getMessage()], 500);
    }
  }

  public function this_month()
  {
    try {
      $month = date('m');
      $data = Appointment:: select(Appointment::raw('DATE(date) as tanggal'), Appointment::raw('COUNT(*) as jumlah'))
        ->where('date', '>=', Appointment::raw("DATE_FORMAT(NOW(), '%Y-%m-01')"))
        ->groupBy('tanggal')
        ->get();
      $data_cancel = Appointment::select(Appointment::raw("DATE_FORMAT(date, '%m') AS bulan, COALESCE(COUNT(*), 0) AS total"))
      ->where('date', '>=', '2023-01-01')
      ->where('date', '<', Appointment::raw("DATE_FORMAT(NOW(), '%Y-%m-01')"))
      ->where('status', '=', 'cancel')
      ->groupBy(Appointment::raw("DATE_FORMAT(date, '%m')"))
      ->get();
      return  response()->json(['data' => $data, 'data_cancel' => $data_cancel], 200);
    } catch (\Exception $e) {
      return response()->json(['data' => $e->getMessage()], 500);
    }
  }

  public function info()
  {
    try {
      $status = statusklinik::find(1);
      return response()->json(['message' => $status->status], 200);
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
  }

  public function tutup()
  {
    $status = statusklinik::find(1);
    $status->update([
      'status'      => 'closed'
    ]);

    return response()->json(['Message' => 'Berhasil Tutup Toko', 'Status' => $status->status]);
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
      return view('dashboard', ['statusklinik' => $statusklinik, 'status' => 'closed', 'patient' => $patient, 'dentist' => $dentist, 'confirmed' => $confirmed, 'canceled' => $canceled, 'treatment' => $treatment]);
    }

    return view('dashboard', ['statusklinik' => $statusklinik, 'patient' => $patient, 'dentist' => $dentist, 'confirmed' => $confirmed, 'canceled' => $canceled, 'treatment' => $treatment]);
  }

  public function update(Request $request)
  {
    $status = statusklinik::find(1);
    Log::channel('stderr')->info("Masuk ke posting,reqguestnya " . $request->status . " ini didb" . $status['status']);
    if ($status['status'] == $request->status) {
      return redirect()->back();
    } else {
      $status->update(['status' => $request->status]);
      return   redirect()->back();
    }
  }
}
