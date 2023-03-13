@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <center><strong>Daftar Pasien Hari Ini</strong></center>
            </span>
        </div>
        <div class="row">
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
                                            Tanggal Pertemuan
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Pasien
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                            <td class="ps-4">
                                              <p class="text-xs font-weight-bold mb-0">
                                                  @foreach ($patientId as $patient)
                                                    @if ($patient->id == $treat->patient_id)
                                                      {{ $patient->name }}
                                                      @break
                                                    @endif
                                                  @endforeach
                                              </p>
                                            </td>
                                            <td class="ps-4">
                                              <p class="text-xs font-weight-bold mb-0">
                                                  @foreach ($patientId as $patient)
                                                    @if ($patient->id == $treat->patient_id)
                                                    <a href="https://wa.me/{{ $patient->phone_no }}" target="_blank">
                                                      {{ $patient->phone_no }}
                                                    </a>
                                                      @break
                                                    @endif
                                                  @endforeach
                                              </p>
                                            </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $treat->status }}</p>
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
                                                    <button type="submit" class="icon-button btn gradient-btn"
                                                        style="background-image: linear-gradient(to bottom right, #ac949a, #ffffff)"
                                                        title="Batalkan Jadwal">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                                <form
                                                    onsubmit="return confirm('Apa anda ingin menyetujui jadwal ini ?');"
                                                    action="today" method="POST">
                                                    <input type="hidden" value="{{ $treat->id }}" name="id">
                                                    <input type="hidden" value="confirm" name="status" id="status">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="icon-button btn gradient-btn"
                                                        style="background-image: linear-gradient(to bottom right, #ac949a, #ffffff)"
                                                        title="Setujui Jadwal">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif
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
                    <p class="text-xs font-weight-bold m-2">Jumlah Pendaftaran Pasien : {{ $data->total() }}</p>
                    <p class="text-xs font-weight-bold m-2">Data Per Halaman : {{ $data->perPage() }} </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
