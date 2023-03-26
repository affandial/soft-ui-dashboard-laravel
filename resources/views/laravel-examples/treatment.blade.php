@extends('layouts.user_type.auth')

@section('content')
    <div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <h3>Data Penanganan Pasien </h3>
                    </div>
                    <form action="cari-treatment" method="POST">
                        @csrf
                        <div class="input-group px-4">
                            <input style="height: 50px" type="text" name="name" class="form-control"
                                placeholder="ketik disini.">
                            <input style="height: 50px" type="date" name="birthdate" class="form-control"
                                placeholder="ketik disini.">
                            <span class="input-group-text text-body " style="height: 50px"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <button type="submit" class="btn btn-outline-primary" style="height: 50px">CARI</button>
                        </div>
                    </form>
                    <div class="card-header pt-0 pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                            </div>
                            <a href="/add-treatment" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;
                                TAMBAH
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Subjective
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Objective
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Assessment
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Plan
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Dokter
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @csrf
                                    <?php $a = ($data->currentPage() - 1) * 20 + 1; ?>
                                    @foreach ($data as $treat)
                                        <tr>
                                            <td class="ps-4" style="text-align: left;  vertical-align: top;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $a }}</p>
                                            </td>
                                            <td class="ps-4" style="text-align: left;  vertical-align: top;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->name }}</p>
                                            </td>
                                            <td class="ps-4" style="text-align: left;  vertical-align: top;">
                                                <p style="white-space: break-spaces;max-width:30ch"
                                                    class="text-xs font-weight-bold mb-0">{{ $treat->subjective }}</p>
                                            </td>
                                            <td class="ps-4" style="text-align: left;  vertical-align: top;">
                                                <p style="white-space: break-spaces;max-width:30ch"
                                                    class="text-xs font-weight-bold mb-0">{{ $treat->objective }}</p>
                                            </td>
                                            <td class="ps-4" style="text-align: left;  vertical-align: top;">
                                                <p style="white-space: break-spaces;max-width:30ch"
                                                    class="text-xs font-weight-bold mb-0">{{ $treat->assessment }}</p>
                                            </td>
                                            <td class="ps-4" style="text-align: left;  vertical-align: top;">
                                                <p style="white-space: break-spaces;max-width:30ch"
                                                    class="text-xs font-weight-bold mb-0">{{ $treat->plan }}</p>
                                            </td>
                                            <td class="ps-4" style="text-align: left;  vertical-align: top;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->name_dentist }}</p>
                                            </td>
                                            <td class="text-center" style=" vertical-align: top;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->date }}</p>
                                            </td>
                                        </tr>
                                        <?php $a++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center pt-2">
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
                        <p class="text-xs font-weight-bold m-2">Jumlah Treatment : {{ $data->total() }}</p>
                        <p class="text-xs font-weight-bold m-2">Data Per Halaman : {{ $data->perPage() }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
