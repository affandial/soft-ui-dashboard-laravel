@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="popupes d-flex justify-content-center align-items-center alert alert-dismissible fade show"
                        style="position:fixed;z-index: 9999;" id="alert-success" role="alert">
                        <div class="popupes-content">
                            <p>{{ session('success') }}</p>&nbsp;&nbsp;
                            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <h3>Jadwal Besok </h3>
                    </div>
                    <div class="card-header pb-0 pt-0">
                        <div class="d-flex flex-row ">
                           <span class="badge badge-sm bg-gradient-secondary">Besok</span>&nbsp;
                            <a href="{{ url('today') }}">
                                <span class="badge badge-sm bg-gradient-light btn-outline-secondary">Hari Ini</span></a>&nbsp;
                            <a href="{{ url('last') }}">
                                <span
                                    class="badge badge-sm bg-gradient-light btn-outline-secondary">Kemarin</span></a>&nbsp;
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Pertemuan
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Pasien
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor Telepon
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
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
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->date }}</p>
                                            </td>
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $treat->name }}
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <span>{{ $treat->phone_no }}</span> &nbsp;&nbsp;
                                                    <a href="https://wa.me/{{ $treat->phone_no }}" target="_blank">
                                                        <img src="../assets/img/wa.svg" class="navbar-brand-img"
                                                            style="max-height:20px" alt="...">
                                                    </a>
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-center text-xs font-weight-bold mb-0">{{ $treat->status }}
                                                </p>
                                            </td>
                                            </td>
                                            <td class="text-center">
                                                @if ($treat->status == 'pending')
                                                    <form
                                                        onsubmit="return confirm('Apa anda ingin membatalkan jadwal ini ?');"
                                                        action="today" method="POST">
                                                        <input type="hidden" value="{{ $treat->id }}" name="id">
                                                        <input type="hidden" value="cancel" name="status" id="status">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            style="padding: 0;border: none;background: none;">
                                                            <img src='../assets/img/gagal.svg' height="20px"></button>
                                                    </form>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $a++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="paginationts">
                            <a href="{{ $data->previousPageUrl() }}"
                                class="prev @if ($data->currentPage() === 1) {{ 'disabled' }} @endif">Previous</a>
                            <a href="#" class="disabled active">{{ $data->currentPage() }}</a>
                            <a href="{{ $data->nextPageUrl() }}" class="next">Next</a>
                        </div>
                        <p class="text-xs font-weight-bold m-2">Jumlah Pendaftaran Pasien : {{ $data->total() }}</p>
                        <p class="text-xs font-weight-bold m-2">Data Per Halaman : {{ $data->perPage() }} </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
