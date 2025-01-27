@extends('layouts.user_type.auth')

@section('content')
    @csrf
    @if (session('status'))
        <div class="m-3 pesan d-flex justify-content-center align-items-center alert alert-success alert-dismissible fade show"
            style="background-size: cover;background-image: url('../assets/img/1932.jpg');position:fixed;top: 0;left: 0;bottom: 0;right: 0;z-index: 9999;"
            id="alert-success" role="alert">
            <form action="/add" method="POST">
                @csrf
                <div class="form-group">
                    <center>
                        <h1>KLINIK SAAT INI SEDANG DALAM KEADAAN TUTUP, APAKAH ANDA INGIN MEMBUKA KLINIK</h1>
                    </center>
                </div>
                <input type="hidden" value="open" name="status" id="status">
                <center>
                    <button class="btn btn-primary bg-success" type="submit">
                        <h1>YA</h1>
                    </button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-secondary bg-transparant" data-bs-dismiss="alert"
                        aria-label="Close">
                        <h1>TIDAK<h1>
                    </button>
                </center>
            </form>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif

     {{-- <div class="d-flex justify-content-end"> --}}
    {{-- <div class="switch-holderers">
        <div class="switch-labelel">
            <i class="fa fa-bluetooth-b"></i><span>TOKO</span>
        </div>
        <div class="switch-togglele">
            <input type="checkbox" id="bluetooth" checked />
            <label for="bluetooth"></label>
        </div>
    </div> --}}
    {{-- </div> --}}
    <div class="row">

        {{-- <div class="d-flex flex-row justify-content-end pt-0">
            <form action="add" method="POST">
                @csrf
                <input type="hidden" value="open" name="status">
                <button type="submit" class='btn btn{{ $buka }}-primary {{ $bb }}'
                    {{ $kb }}>BUKA</button> &nbsp; &nbsp;
            </form>
            <form action="add" method="POST">
                @csrf
                <input type="hidden" value="closed" name="status">
                <button type="submit" class='btn btn{{ $tutup }}-primary {{ $bt }}'
                    {{ $kt }}>TUTUP</button>
            </form>
        </div> --}}
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
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
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
    <div class="row mt-4">

        <div class="col">
            <div class="card z-index-1">
                <div class="card-header pb-0">
                    <img src="../assets/img/welcome.png" style="width: 100%;  height: 100%;  object-fit: cover;">

                </div>

            </div>
        </div>
    </div>
    <script>
        localStorage.setItem("status_klinik", "{{$statusklinik->status}}");
    </script>
@endsection
