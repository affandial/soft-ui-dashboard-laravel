<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class PatientController extends Controller
{
  public function index()
  {
    $data = Patient::latest()->paginate(20);
    return view('laravel-examples/data-patient', ['data' => $data]);
  }

  public function index_edit($id)
  {
    // Log::channel('stderr')->info($id);
    $data = Patient::where('id', '=', $id)->get();
    return view('laravel-examples/edit-patient', ['data' => $data]);
  }

  public function update(Request $request)
  {
    Log::channel('stderr')->info("GAGAL" . $request);
    $record = Patient::findOrFail($request->id);

    $check = request()->validate([
      'name'      => ['required', 'min:4'],
      'phone_no'  => ['required', 'max:15'],
      'gender'    => ['required', 'max:6'],
    ]);


    try {
      $record->update([
        'name'      => $request['name'],
        'phone_no'  => $request['phone_no'],
        'email'     => $request['email'],
        'gender'    => $request['gender'],
        'address'   => $request['address'],
        'birthdate' => $request['birthdate'],
      ]);
    } catch (QueryException $e) {
      if ($e->errorInfo[1] == 1062) { // error code for duplicate entry
        return redirect()->back()->withErrors(['message' => 'Gagal ubah data pasien, Email / no telepon sudah terdaftar.']);
      } else {
        return redirect()->back()->withErrors(['message' => 'Gagal ubah data pasien, Harap periksa data yang ada input']);
      }
    }

    Log::channel('stderr')->info("Id $request->id berhasil di update");
    $data = Patient::latest()->paginate(20);
    return redirect('data-patient')->with([
      'data' => $data,
      'success' => 'Data Pasien Berhasil diubah'
    ]);
  }

  public function create()
  {
    return view('laravel-examples/add-patient');
  }

  public function search(Request $request)
  {
    Log::channel('stderr')->info("\n\n\Pencarian Data\n\n");
    if (is_null($request->name) && is_null($request->birthdate)) {
      return redirect('data-patient');
    }
    $query = Patient::query();

    if ($request->name && $request->birthdate) {
      $query
        ->where('name', 'like', "%$request->name%")
        ->where('birthdate', $request->birthdate);
    } elseif ($request->name) {
      $query->where('name', 'like', "%$request->name%");
    } elseif ($request->birthdate) {
      $query->where('birthdate', $request->birthdate);
    }

    $data = $query->paginate(20);
    return view('laravel-examples/data-patient', ['data' => $data]);
  }

  public function  store(Request $request)
  {
    $data = request()->validate([
      'name'      => ['required', 'min:4'],
      'phone_no'  => ['required', 'max:15'],
      'gender'    => ['required', 'max:6'],
    ]);


    try {
      Patient::create([
        'name'      => $request['name'],
        'phone_no'  => $request['phone_no'],
        'email'     => $request['email'],
        'gender'    => $request['gender'],
        'address'   => $request['address'],
        'birthdate' => $request['birthdate'],
      ]);
    } catch (QueryException $e) {
      if ($e->errorInfo[1] == 1062) { // error code for duplicate entry
        return redirect()->back()->withErrors(['message' => 'Email / no telepon sudah terdaftar. silahkan input kembali']);
      } else {
        return redirect()->back()->withErrors(['message' => 'harap periksa data yang ada inpuT. Silahkan coba lagi.']);
      }
    }
    //redirect to form add-patient
    return redirect()->back()->with('success', 'Data Pasien Berhasil diinput');
  }

  public function destroy(Request $request)
  {
    $patient = Patient::findOrFail($request->id);
    $patient->delete();
    return redirect('/data-patient')->with('success', 'Data Pasien Berhasil dihapus');
  }
}
