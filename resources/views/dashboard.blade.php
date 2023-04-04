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
    {{-- Header Data --}}
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
        <div class="col-lg-5 mb-lg-0 mb-4">
            <div class="card-body p-3">
                <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
                {{-- <h6 class="ms-2 mt-4 mb-0"> Total Appointment Users </h6> --}}
                <div class="container border-radius-lg">
                    Data grafik pasien yang membuat janji / jadwal untuk pemeriksaan di klinik Gigi dari awal tahun untuk
                    memantau proses penjadwalan pasien
                    kebelakang
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>REPORT BULAN INI</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        localStorage.setItem("status_klinik", "{{$statusklinik->status}}");
    </script>
@endsection

@push('dashboard')
    <script>
        window.onload = function() {
            const months = {
                "01": 'Januari',
                "02": 'Februari',
                "03": 'Maret',
                "04": 'April',
                "05": 'Mei',
                "06": 'Juni',
                "07": 'Juli',
                "08": 'Agustus',
                "09": 'September',
                "10": 'Oktober',
                "11": 'November',
                "12": 'Desember',
            }
            async function fetchDataBar() {
                const url = 'http://localhost:8000/this_year';
                try {
                    const response = await fetch(url);
                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('Error fetching data from API:', error);
                    return null;
                }
            }

            async function getDataBar() {
                const isi_data = await fetchDataBar();
                const data = isi_data.data.map(e => months[e.bulan])
                const total_data = isi_data.data.map(e => e.total)
                const cancel = isi_data.data_cancel.map(e => months[e.bulan])
                const total_cancel = isi_data.data_cancel.map(e => e.total)
                var ctx = document.getElementById("chart-bars").getContext("2d");
                new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: data,
                        datasets: [{
                            label: "Ditangani",
                            tension: 0.4,
                            borderWidth: 0,
                            borderRadius: 4,
                            borderSkipped: false,
                            backgroundColor: "green",
                            data: total_data,
                            maxBarThickness: 6
                        }, {
                            label: "Cancel",
                            tension: 0.4,
                            borderWidth: 0,
                            borderRadius: 4,
                            borderSkipped: false,
                            backgroundColor: "red",
                            data: total_cancel,
                            maxBarThickness: 6
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    suggestedMin: 0,
                                    suggestedMax: 100,
                                    beginAtZero: false,
                                    padding: 15,
                                    font: {
                                        size: 14,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                    color: "#fff"
                                },
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false
                                },
                                ticks: {
                                    display: true
                                },
                            },
                        },
                    },
                });


            }

            getDataBar()

             var ctx2 = document.getElementById("chart-line").getContext("2d");
                var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
                gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
                gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)');
            //purple colors
            var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
            gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
            gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
            new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: "Mobile apps",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#cb0c9f",
                            borderWidth: 3,
                            backgroundColor: gradientStroke1,
                            fill: true,
                            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                            maxBarThickness: 6
                        },
                        {
                            label: "Websites",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#3A416F",
                            borderWidth: 3,
                            backgroundColor: gradientStroke2,
                            fill: true,
                            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                            maxBarThickness: 6
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#b2b9bf',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#b2b9bf',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        }
    </script>
@endpush
