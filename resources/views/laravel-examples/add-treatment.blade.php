@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="container-fluid">
            <div class="page-header min-height-100 border-radius-xl mt-4"
                style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">

                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                TAMBAH PASIEN YANG SUDAH DITANGANI
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Harap isi semua kolom yang tersedia
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">

                <div class="card-body pt-4 p-3">
                    <form action="add-treatment " method="POST" role="form text-left" onsubmit="return konfirmasiSubmit()">
                        @csrf
                        @if ($errors->any())
                            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                    {{ $errors->first() }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success"
                                role="alert">
                                <span class="alert-text text-white">
                                    {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_kwitansi" class="form-control-label">Nomor Kwitansi</label>
                                    <div>
                                        <input class="form-control" type="text" placeholder="Silahkan masukkan nomor kwitansi"
                                            id="no_kwitansi" name="no_kwitansi" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date"> Tanggal</label>
                                    <div style="">
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">Total Pembayaran</label>
                                    <div>
                                        <input class="form-control" type="number" placeholder="Total Biaya Penanganan Pasien"
                                            id="price" required name="price" autocomplete="off" >

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="patient_id" class="form-control-label">Nama Pasien</label>
                                    <div style="">
                                        <select name="patient_id" id="patient_id" class="form-select"
                                            aria-label="Disabled select example" required>
                                            <option selected value="">Pilih</option>
                                            @foreach ($patientId as $patient)
                                            <option value="{{$patient->id}}">{{$patient->name}} -  {{$patient->phone_no}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="dentist_id" class="form-control-label">Dokter Yang Menangani</label>
                                    <div style="">
                                        <select name="dentist_id" id="dentist_id" class="form-select"
                                            aria-label="Disabled select example" required>
                                            <option selected value="">Pilih</option>
                                            @foreach ($dentistId as $dentist)
                                            <option value="{{$dentist->id}}">{{$dentist->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="type">Type Penanganan Pasien</label>
                        <div class="@error('user.type')border border-danger rounded-3 @enderror">
                            <input type="text" class="form-control" required id="type" name="type" rows="2" placeholder="Type Penanganan Terhadap Pasien contoh : 'Tambal Gigi, Bersihkan Karang'" name="description"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="description">Deskripsi Penanganan Pasien</label>
                        <div class="@error('user.about')border border-danger rounded-3 @enderror">
                            <textarea class="form-control" required id="description" name="description" rows="3" placeholder="Deskripsi Penanganan Terhadap Pasien" name="description"></textarea>
                        </div>
                    </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function konfirmasiSubmit() {
            var elemen = document.getElementById("no_kwitansi");
          if(confirm("Apakah data sudah sesuai?")) {
            
            return true;
          } else {
            return false;
          }
        }
      </script>
@endsection
