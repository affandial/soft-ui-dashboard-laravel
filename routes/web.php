<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
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
  Route::get('dashboard/{status?}', [DashboardController::class, 'index']);
  Route::post('add', [DashboardController::class, 'update']);
  Route::get('open_klinik', [DashboardController::class, 'open_klinik']);
  Route::get('close_klinik', [DashboardController::class, 'close_klinik']);

  # Route Treatment / Penanganan
  Route::get('treatment', [TreatmentController::class, 'index']);
  Route::get('add-treatment', [TreatmentController::class, 'create']);
  Route::post('add-treatment', [TreatmentController::class, 'store']);
  Route::post('cari-treatment', [TreatmentController::class, 'search']);

  # Route Jadwal
  Route::get('today', [AppointmentController::class, 'index']);
  Route::put('today', [AppointmentController::class, 'update']);
  Route::get('last', [AppointmentController::class, 'last']);
  Route::put('last', [AppointmentController::class, 'update']);
  Route::get('next', [AppointmentController::class, 'next']);
  Route::get('add-jadwal', [AppointmentController::class, 'create']);
  Route::post('add-jadwal', [AppointmentController::class, 'store']);


  # Route Dokter
  Route::get('data-dokter', [DentistController::class, 'index']);
  Route::get('add-dokter', [DentistController::class, 'create']);
  Route::post('add-dokter', [DentistController::class, 'store']);
  Route::get('edit-dokter/{id}', [DentistController::class, 'index_edit'])->name('editdokter');
  Route::delete('data-dokter', [DentistController::class, 'destroy']);
  Route::post('edit-dokter', [DentistController::class, 'update']);
  Route::post('cari-dokter', [DentistController::class, 'search']);

  # Route Pasien
  Route::get('data-patient', [PatientController::class, 'index']);
  Route::get('add-patient', [PatientController::class, 'create']);
  Route::post('add-patient', [PatientController::class, 'store']);
  Route::post('cari-patient', [PatientController::class, 'search']);
  Route::delete('data-patient', [PatientController::class, 'destroy']);
  Route::get('edit-patient/{id}', [PatientController::class, 'index_edit'])->name('editpatient');
  Route::post('edit-patient', [PatientController::class, 'update']);


  Route::get('/logout', [SessionsController::class, 'destroy']);

  Route::get('/login', function () {
    return view('dashboard');
  })->name('sign-up');
});

Route::group(['middleware' => 'guest'], function () {
  // Route::get('/register', [RegisterController::class, 'create']);
  // Route::post('/register', [RegisterController::class, 'store']);
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

Route::get('info', [DashboardController::class, 'info']);
Route::get('force_closed', [DashboardController::class, 'tutup']);