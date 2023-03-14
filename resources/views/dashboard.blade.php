@extends('layouts.user_type.auth')

@section('content')
    @csrf
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pasien</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $patient }}

                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md justify-content-center d-flex">
                                <img src="../assets/img/patient.svg" class="navbar-brand-img  w-50" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Dokter</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $dentist }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md justify-content-center d-flex">
                                <img src="../assets/img/doc.svg" class="navbar-brand-img  w-50" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Treatment</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $treatment }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md justify-content-center d-flex">
                                <img src="../assets/img/check.svg" class="navbar-brand-img  w-50" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4"">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Dibatalkan</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $canceled }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div
                                class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md justify-content-center d-flex">
                                <img src="../assets/img/cancel.svg" class="navbar-brand-img  w-50" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-4 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">

        <div class="d-flex flex-row justify-content-between">

            <a href="add-jadwal" class="btn bg-gradient-primary btn-sm mb-0 mx-auto" type="button"> BUAT JADWAL BARU
                PASIEN</a>

        </div>

    </div>
    <div class="row mt-4">

        <div class="col">
            <div class="card z-index-1">
                <div class="card-header pb-0">
                    <img src="../assets/img/welcome.png" style="width: 100%;  height: 100%;  object-fit: cover;">

                </div>

            </div>
        </div>
    </div>
@endsection
