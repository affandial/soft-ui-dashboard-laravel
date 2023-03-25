@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            @csrf
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <h3>Data Dokter </h3>
                    </div>
                    <form action="cari-dokter" method="POST">
                        @csrf
                        <div class="input-group px-4">
                            <button type="submit" class="btn btn-outline-primary" style="height: 50px">CARI</button>
                            <span class="input-group-text text-body " style="height: 50px"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input style="height: 50px" type="text" name="name" class="form-control"
                                placeholder="ketik disini.">
                            <input style="height: 50px" type="date" name="birthdate" class="form-control"
                                placeholder="ketik disini.">
                        </div>
                    </form>
                    <div class="card-header pt-0 pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                            </div>
                            <a href="/add-dokter" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; TAMBAH
                            </a>
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
                                            Gender
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Speciality
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->address }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->email }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{$treat->specialty}}</span>
                                            </td>
                                            <td class="text-center">
                                                <form
                                                    onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Dokter {{ $treat->name }}?');"
                                                    action="" method="POST">
                                                    <a href="{{ route('editdokter', $treat->id) }}" class="mx-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Ubah Data Dokter">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                    <input type="hidden" value="{{ $treat->id }}" name="id"
                                                        id="id">
                                                    @csrf @method('DELETE') <button
                                                        style="border: none;background-color: Transparent" type="submit"><i
                                                            title="Hapus dokter"
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
                                    <a class="page-link" href="{{ $data->previousPageUrl() }}">back</a>
                                </li>
                                <li class="page-item  disabled"><a class="page-link" href="#">
                                        {{ $data->currentPage() }}</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="{{ $data->nextPageUrl() }}">next</a>
                                </li>
                            </ul>
                        </nav>
                        <hr>
                        <p class="text-xs font-weight-bold m-2">Jumlah Dokter : {{ $data->total() }}</p>
                        <p class="text-xs font-weight-bold m-2">Data Per Halaman : {{ $data->perPage() }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
