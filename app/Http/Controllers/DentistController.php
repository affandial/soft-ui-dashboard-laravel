<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;


class DentistController extends Controller
{
  public function index()
  {
    $data = Dentist::latest()->paginate(20);
    return view('laravel-examples/data-dokter', ['data' => $data]);
  }

  public function index_edit($id)
  {
    // Log::channel('stderr')->info($id);
    $data = Dentist::where('id', '=', $id)->get();
    return view('laravel-examples/edit-dokter ', ['data' => $data]);
  }

  public function update(Request $request)
  {
    Log::channel('stderr')->info("masuk kesini");
    $record = Dentist::findOrFail($request->id);
    Log::channel('stderr')->info("masuk kesini");

    $check = request()->validate([
      'name'      => ['required', 'min:4'],
      'email'     => ['required', 'min:5'],
      'phone'     => ['required'],
      'address'   => ['required', 'max:255'],
      'gender'    => ['required'],
      'specialty' => ['required'],
    ]);

    try {
      $record->update($check);
    } catch (QueryException $e) {
      if ($e->errorInfo[1] == 1062) { // error code for duplicate entry
        return redirect()->back()->withErrors(['message' => 'Email / no telepon sudah terdaftar. silahkan input kembali']);
      } else {
        return redirect()->back()->withErrors(['message' => 'harap periksa data yang ada inpuT. Silahkan coba lagi.']);
      }
    }

    Log::channel('stderr')->info("Data doker ID = $request->id berhasil di update");
    $data = Dentist::latest()->paginate(20);
    return redirect('data-dokter')->with([
      'data' => $data,
      'success' => 'Data Dokter Berhasil diubah'
    ]);
  }

  public function create()
  {
    return view('laravel-examples/add-dokter');
  }

  public function store(Request $request)
  {
    $data = request()->validate([
      'name'      => ['required', 'min:4'],
      'email'     => ['required', 'min:5'],
      'phone'     => ['required', 'max:15'],
      'address'   => ['required', 'max:255'],
      'gender'    => ['required'],
      'specialty' => ['required'],
    ]);

    try {
      Dentist::create($data);
    } catch (\Illuminate\Database\QueryException $e) {
      if ($e->errorInfo[1] == 1062) { // error code for duplicate entry
        return redirect()->back()->withErrors(['message' => 'Email / no telepon sudah terdaftar. silahkan input kembali']);
      } else {
        return redirect()->back()->withErrors(['message' => 'harap periksa data yang ada inpuT. Silahkan coba lagi.']);
      }
    }

    //redirect to index
    return  redirect()->back()->with('success', 'Data Dokter Berhasil ditambahkan');
  }
}
