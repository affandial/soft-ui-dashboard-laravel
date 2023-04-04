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
      $data = Appointment::select(Appointment::raw('YEAR(date) AS tahun, MONTH(date) AS bulan, COUNT(*) AS total_data, SUM(CASE WHEN status = "cancel" THEN 1 ELSE 0 END) AS total_cancel'))
        ->whereRaw('date >= DATE_FORMAT(NOW(), "%Y-01-01")')
        ->whereRaw('date < DATE_FORMAT(NOW(), "%Y-%m-01")')
        ->groupBy(Appointment::raw('YEAR(date), MONTH(date)'))
        ->get();

      return  response()->json(['data' => $data], 200);
    } catch (\Exception $e) {
      return response()->json(['data' => $e->getMessage()], 500);
    }
  }

  public function this_month()
  {
    try {
      $data = Appointment::select(
        Appointment::raw('DATE_FORMAT(date, "%d") as date'),
        Appointment::raw('SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending_count'),
        Appointment::raw('SUM(CASE WHEN status = "cancel" THEN 1 ELSE 0 END) as cancel_count'),
        Appointment::raw('SUM(CASE WHEN status = "confirm" THEN 1 ELSE 0 END) as confirm_count'),
        Appointment::raw('COUNT(*) as total')
      )
        ->whereRaw('MONTH(date) = MONTH(NOW())')
        ->whereRaw('YEAR(date) = YEAR(NOW())')
        ->groupBy(Appointment::raw('date'))
        ->get();
      $result = Treatment::select(
        Treatment::raw('DATE_FORMAT(date, "%d") as date'),
        Treatment::raw('COUNT(*) as total')
      )
        ->whereRaw('MONTH(date) = MONTH(NOW())')
        ->whereRaw('YEAR(date) = YEAR(NOW())')
        ->groupBy(Treatment::raw('date'))
        ->get();

      return  response()->json(['data' => $data, 'result' => $result], 200);
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
