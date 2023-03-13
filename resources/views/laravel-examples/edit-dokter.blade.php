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
                                UBAH DATA DOKTER
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Form ini untuk mengubah data dokter
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">

                <div class="card-body pt-4 p-3">
                    <form action="/edit-dokter" method="POST" role="form text-left">
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
                        @foreach ($data as $d)
                            <div class="row">
                                <input type="hidden" value="{{ $d->id }}" name="id" id="id">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Nama</label>
                                        <div>
                                            <input class="form-control" value="{{ $d->name }}" type="text"
                                                placeholder="Silahkan input nama" id="name" name="name"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <div>
                                            <input class="form-control" value="{{ $d->email }}" type="email"
                                                placeholder="Silahkan masukkan email " id="email" required
                                                name="email" autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-control-label">Nomor Telepon</label>
                                        <div>
                                            <input class="form-control" value="{{ $d->phone }}" type="number"
                                                placeholder="Masukkan nomor telepon" id="phone" name="phone"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.location" class="form-control-label">Alamat</label>
                                        <div>
                                            <input class="form-control" value="{{ $d->address }}" type="text"
                                                placeholder="Sialhkan masukkan alamat" id="address" required
                                                name="address" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.phone" class="form-control-label">Jenis Kelamin</label>
                                        <div style="max-width: 200px">
                                            <select name="gender" id="gender" class="form-select"
                                                aria-label="Disabled select example" required>
                                                <option selected value="{{ $d->gender }}">Pilih</option>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specialty" class="form-control-label">Specialty</label>
                                        <div>
                                            <input class="form-control" value="{{ $d->specialty }}" type="text"
                                                placeholder="Masukkan Specialty" id="specialty" required name="specialty"
                                                autocomplete="off" style="max-width: 200px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
