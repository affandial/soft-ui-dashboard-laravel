@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <center><strong>Data Pasien</strong></center>
            </span>
        </div>
        <div class="row">
            @csrf
            <div class="col-12">
              @if (session('success'))
                    <div class="m-4 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                            {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                <div class="card mb-4 mx-4">


                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                            </div>
                            <a href="/add-patient" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; TAMBAH
                                PASIEN</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis Kelamin
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor Telepon
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Lahir
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @csrf
                                    <?php $a = ($data->currentPage() - 1) * 20 + 1; ?>
                                    @foreach ($data as $treat)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $a }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->name }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->gender }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->phone_no }}</p>
                                            </td>
                                            <td class="">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->email }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $treat->birthdate }}</span>
                                            </td>
                                            <td class="text-center">
                                                <form
                                                    onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus data pasien {{ $treat->name }}?');"
                                                    action="" method="POST">
                                                    <a href="{{ route('editpatient', $treat->id) }}" class="mx-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Ubah Data Pasien">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                    <input type="hidden" value="{{ $treat->id }}" name="id"
                                                        id="id">
                                                    @csrf @method('DELETE')<button  style="border: none;background-color: Transparent" type="submit"><i title="Hapus Data Pasien"
                                                            class="cursor-pointer fas fa-trash text-secondary"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $a++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $data->previousPageUrl() }}" >back</a>
                                </li>
                                <li class="page-item  disabled"><a class="page-link" href="#"> {{ $data->currentPage() }}</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="{{ $data->nextPageUrl() }}">next</a>
                                </li>
                            </ul>
                        </nav>
                        <hr>
                        <p class="text-xs font-weight-bold m-2">Jumlah Pasien : {{ $data->total() }}</p>
                        <p class="text-xs font-weight-bold m-2">Data Per Halaman : {{ $data->perPage() }} </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
