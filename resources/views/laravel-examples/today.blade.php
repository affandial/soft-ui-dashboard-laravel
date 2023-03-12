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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Tanggal Pertemuan
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Nama Pasien
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Nomor Telepon
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Email
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Action
                  </th>

                </tr>
              </thead>
              <tbody>
                @csrf
                <?php $a=($data->currentPage()-1 )* 20 +1 ;?>
                @foreach ($data as $treat)
                <tr>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{$a}}</p>
                  </td>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{$treat->date}}</p>
                  </td>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">Blm</p>
                  </td>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{$treat->date}}</p>
                  </td>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">Admin</p>
                  </td>
                  <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">{{$treat->status}}</p>
                  </td>
                  <td class="text-center">
                    @if ($treat->status == 'pending')
                    <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Konfirmasi Jadwal">
                      <i class=" fas fa-check text-secondary"></i>
                    </a>
                    <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Batalkan Jadwal">
                      <i class="fas fa-times text-secondary"></i>
                    </a>
                    <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Atur Ulang Jadwal">
                      <i class=" fas fa-clock text-secondary"></i>
                    </a>
                    @endif
                  </td>
                </tr>
                <?php $a++; ?>
                @endforeach
              </tbody>
            </table>
          </div>
           <p class="text-xs font-weight-bold m-2">Halaman : {{ $data->currentPage() }}</p>
          <p class="text-xs font-weight-bold m-2">Jumlah Data : {{ $data->total() }}</p>
          <p class="text-xs font-weight-bold m-2">Data Per Halaman : {{ $data->perPage() }} </p>
          <p class="text-xs font-weight-bold m-2"> <a href="{{ $data->previousPageUrl()}}">PREVIOUS PAGE</a>  ||  <a href="{{ $data->nextPageUrl()}}">NEXT PAGE</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection