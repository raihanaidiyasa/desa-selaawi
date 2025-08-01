@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">

        {{-- Data Agama --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Agama</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Agama</th>
                                        <th scope="col">Penganut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataAgamas as $agama)
                                    <tr>
                                        <td>{{ $agama->agama }}</td>
                                        <td>{{ $agama->penganut }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $totalPenganut }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="agamaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <hr>

        {{-- Data Jenis Kelamin --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Jenis Kelamin</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataJenisKelamins as $dataJenisKelamin)
                                    <tr>
                                        <td>{{ $dataJenisKelamin->jenis_kelamin }}</td>
                                        <td>{{ $dataJenisKelamin->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $jumlahTotal }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="jenisKelaminChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        {{-- Data Pekerjaan --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Pekerjaan</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Pekerjaan</th>
                                        <th scope="col">jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaans as $pekerjaan)
                                    <tr>
                                        <td>{{ $pekerjaan->pekerjaan }}</td>
                                        <td>{{ $pekerjaan->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $totalPekerjaan }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="pekerjaanChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <hr>

        {{-- Data Rentang Umur --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Rentang Umur</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Rentang Umur</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentang_umurs as $rentang_umur)
                                    <tr>
                                        <td>{{ $rentang_umur->rentang_umur }}</td>
                                        <td>{{ $rentang_umur->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $totalRentangUmur }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="rentangUmurChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        {{-- Data Pendidikan --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Pendidikan</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Tingkat Pendidikan</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendidikans as $pendidikan)
                                    <tr>
                                        <td>{{ $pendidikan->pendidikan }}</td>
                                        <td>{{ $pendidikan->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $totalPendidikan }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="pendidikanChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        {{-- Data Lembaga Pendidikan --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Lembaga Pendidikan</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Lembaga</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lembagaPendidikans as $lembaga)
                                    <tr>
                                        <td>{{ $lembaga->lembaga }}</td>
                                        <td>{{ $lembaga->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $totalLembagaPendidikan }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="lembagaPendidikanChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        {{-- Data Ekonomi --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Sarana Ekonomi</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Jenis Usaha</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ekonomis as $ekonomi)
                                    <tr>
                                        <td>{{ $ekonomi->ekonomi }}</td>
                                        <td>{{ $ekonomi->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $totalEkonomi }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="ekonomiChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        {{-- Data Kesehatan --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Sarana Kesehatan</h2>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Sarana / Tenaga</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kesehatans as $kesehatan)
                                    <tr>
                                        <td>{{ $kesehatan->kesehatan }}</td>
                                        <td>{{ $kesehatan->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-warning">
                                    <tr>
                                        <td>Total </td>
                                        <td>{{ $totalKesehatan }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="kesehatanChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        {{-- Data Pertanian --}}
        <div class="row my-4">
            <div class="section-title">
                <h2>Data Pertanian</h2>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Jenis Tanaman</th>
                                        <th scope="col">Luas (Ha)</th>
                                        <th scope="col">Hasil Produksi (Ton)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pertanians as $pertanian)
                                    <tr>
                                        <td>{{ $pertanian->jenis }}</td>
                                        <td>{{ $pertanian->luas }}</td>
                                        <td>{{ $pertanian->hasil }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="pertanianChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

{{-- SCRIPTS --}}
<script>
    // Chart Agama
    const ctxAgama = document.getElementById('agamaChart');
    new Chart(ctxAgama, {
      type: 'bar',
      data: {
        labels: {!! $labels !!},
        datasets: [{
          label: 'Penganut Agama',
          data: {!! $dataPenganut !!},
          backgroundColor: 'rgba(75, 192, 192, 0.5)',
          borderColor: 'rgb(75, 192, 192)',
          borderWidth: 1
        }]
      },
      options: { scales: { y: { beginAtZero: true } } }
    });

    // Chart Jenis Kelamin
    const ctxJenisKelamin = document.getElementById('jenisKelaminChart');
    new Chart(ctxJenisKelamin, {
        type: 'pie', 
        data: {
            labels: {!! $labelsJenisKelamin !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! $jumlah !!},
                backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 99, 132)'],
                hoverOffset: 4
            }]
        }
    });

    // Chart Pekerjaan
    const ctxPekerjaan = document.getElementById('pekerjaanChart');
    new Chart(ctxPekerjaan, {
        type: 'bar',
        data: {
            labels: {!! $labelPekerjaan !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! $jumlahPekerjaan !!},
                backgroundColor: 'rgba(255, 205, 86, 0.5)',
                borderColor: 'rgb(255, 205, 86)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Chart Rentang Umur
    const ctxRentangUmur = document.getElementById('rentangUmurChart');
    new Chart(ctxRentangUmur, {
        type: 'bar',
        data: {
            labels: {!! $labelRentangUmur !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! $jumlahRentangUmur !!},
                backgroundColor: 'rgba(153, 102, 255, 0.5)',
                borderColor: 'rgb(153, 102, 255)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Chart Pendidikan
    const ctxPendidikan = document.getElementById('pendidikanChart');
    new Chart(ctxPendidikan, {
        type: 'bar',
        data: {
            labels: {!! $labelPendidikan !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! $jumlahPendidikan !!},
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Chart Lembaga Pendidikan
    const ctxLembagaPendidikan = document.getElementById('lembagaPendidikanChart');
    new Chart(ctxLembagaPendidikan, {
        type: 'bar',
        data: {
            labels: {!! $labelLembagaPendidikan !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! $jumlahLembagaPendidikan !!},
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Chart Ekonomi
    const ctxEkonomi = document.getElementById('ekonomiChart');
    new Chart(ctxEkonomi, {
        type: 'bar',
        data: {
            labels: {!! $labelEkonomi !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! $jumlahEkonomi !!},
                backgroundColor: 'rgba(255, 159, 64, 0.5)',
                borderColor: 'rgb(255, 159, 64)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Chart Kesehatan
    const ctxKesehatan = document.getElementById('kesehatanChart');
    new Chart(ctxKesehatan, {
        type: 'bar',
        data: {
            labels: {!! $labelKesehatan !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! $jumlahKesehatan !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Chart Pertanian
    const ctxPertanian = document.getElementById('pertanianChart');
    new Chart(ctxPertanian, {
        type: 'bar',
        data: {
            labels: {!! $labelPertanian !!},
            datasets: [
                {
                    label: 'Luas (Ha)',
                    data: {!! $luasPertanian !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1,
                    yAxisID: 'y'
                },
                {
                    label: 'Hasil Produksi (Ton)',
                    data: {!! $hasilPertanian !!},
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgb(255, 159, 64)',
                    borderWidth: 1,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Luas (Ha)'
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Hasil Produksi (Ton)'
                    },
                    grid: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                },
            }
        }
    });
</script>
@endsection
