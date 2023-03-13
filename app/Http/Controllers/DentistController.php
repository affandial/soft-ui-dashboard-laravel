<?php

namespace App\Http\Controllers;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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
    // Log::channel('stderr')->info($request);
    $record = Dentist::findOrFail($request->id);

    $check = request()->validate([
      'name'      => ['required', 'min:4'],
      'email'     => ['required', 'min:5'],
      'phone'     => ['required'],
      'address'   => ['required', 'max:255'],
      'gender'    => ['required'],
      'specialty' => ['required'],
    ]);

    $record->update($check);
    Log::channel('stderr')->info("Data doker ID = $request->id berhasil di update");
    $data = Dentist::latest()->paginate(20);
    return view('laravel-examples/data-dentist', ['data' => $data])->with('success', 'Data Pasien Berhasil diubah');
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
      'phone'     => ['required'],
      'address'   => ['required', 'max:255'],
      'gender'    => ['required'],
      'specialty' => ['required'],
    ]);

    Dentist::create($data);
    // Dentist::create([
    //   'name'      => $request['name'],
    //   'phone_no'  => $request['phone_no'],
    //   'email'     => $request['email'],
    //   'gender'    => $request['gender'],
    //   'address'   => $request['address'],
    //   'birthdate' => $request['birthdate'],
    // ]);

    //redirect to index
    return redirect('/add-dokter')->with('success', 'Data Dokter Berhasil ditambahkan');
  }

}
