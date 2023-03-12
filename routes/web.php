<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

  Route::get('/', [HomeController::class, 'home']);
  Route::get('dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  // Route::get('treatment', function () {
  //   return view('laravel-examples/treatment');
  // });

  // Route::get('today', function () {
  //   return view('laravel-examples/today');
  // })->name('today');

  // Route::get('data-dokter', function () {
  //   return view('laravel-examples/data-dokter');
  // })->name('data-dokter');

  // Route::get('data-patient', function () {
  //   return view('laravel-examples/data-patient');
  // })->name('data-patient');

  Route::get('last', function () {
    return view('laravel-examples/last');
  })->name('last');

  Route::get('next-temu', function () {
    return view('laravel-examples/next-temu');
  })->name('next-temu');

  # Route Penanganan
  Route::get('treatment', [TreatmentController::class, 'index']);
  Route::get('add-treatment', [TreatmentController::class, 'create']);
  Route::post('add-treatment', [TreatmentController::class, 'store']);

  Route::get('today', [AppointmentController::class, 'index']);

  # Route Dokter
  Route::get('data-dokter', [DentistController::class, 'index']);
  Route::get('add-dokter', [DentistController::class, 'create']);
  Route::post('add-dokter', [DentistController::class, 'store']);

  # Route Pasien
  Route::get('data-patient', [PatientController::class, 'index']);
  Route::get('add-patient', [PatientController::class, 'create']);
  Route::post('add-patient', [PatientController::class, 'store']);
  Route::delete('data-patient', [PatientController::class, 'destroy']);
  Route::get('edit-patient', [PatientController::class, 'index_edit']);
  Route::post('edit-patient', [PatientController::class, 'update']);


  Route::get('/logout', [SessionsController::class, 'destroy']);

  Route::get('/login', function () {
    return view('dashboard');
  })->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [RegisterController::class, 'create']);
  Route::post('/register', [RegisterController::class, 'store']);
  Route::get('/login', [SessionsController::class, 'create']);
  Route::post('/session', [SessionsController::class, 'store']);
  Route::get('/login/forgot-password', [ResetController::class, 'create']);
  Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
  Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
  Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
  return view('session/login-session');
})->name('login');
