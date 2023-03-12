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
