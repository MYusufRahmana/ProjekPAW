@extends('layout.master')

@section('title', 'Halaman Film')

@section('content')
<div class="row">
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body" onclick="redirectToFilm()">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                <div>
                    <p class="mb-2 text-md-center text-lg-left">
                        <a href="{{route('film.index')}}">Jumlah Film</a>
                    </p>
                    <h1 class="mb-0">{{$film}}</h1>
                </div>
                <i class="typcn typcn-device-desktop icon-xl text-success"></i>
            </div>
            <canvas id="balance-chart" height="31" width="116" style="display: block; width: 233px; height: 62px;" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body" onclick="redirectToPesanan()">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                <div>
                    <p class="mb-2 text-md-center text-lg-left">
                        <a href="{{route('pesanan.index')}}">Jumlah Pesanan</a>
                    </p>
                    <h1 class="mb-0">{{$pesanan}}</h1>
                </div>
                <i class="typcn typcn-briefcase icon-xl text-success"></i>
            </div>
            <canvas id="expense-chart" height="31" width="116" style="display: block; width: 233px; height: 62px;" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body" onclick="redirectToCinema()">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                <div>
                    <p class="mb-2 text-md-center text-lg-left">
                        <a href="{{route('cinema.index')}}">Jumlah Cinema</a>
                    </p>
                    <h1 class="mb-0">{{$cinema}}</h1>
                </div>
                <i class="typcn typcn-video icon-xl text-success"></i>
            </div>
            <canvas id="expense-chart" height="31" width="116" style="display: block; width: 233px; height: 62px;" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body" onclick="redirectToCinema()">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                <div>
                    <p class="mb-2 text-md-center text-lg-left">
                        <a href="{{route('pembayaran.index')}}">Metode Pembayaran</a>
                    </p>
                    <h1 class="mb-0">{{$pembayaran}}</h1>
                </div>
                <i class="typcn typcn-video icon-xl text-success"></i>
            </div>
            <canvas id="expense-chart" height="31" width="116" style="display: block; width: 233px; height: 62px;" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>


</div>

<div class="col-lg-12 grid-margin stretch-card">

</div>
<!-- Grafik -->
<!-- Html -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure mt-5">
    <div id="container"></div>
</figure>



<!-- CSS -->
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }
    .card-body:hover {
        background-color: #f0f0f0;
        transition: background-color 0.3s ease;
    }

    .card-body:hover .icon-xl {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }

    .icon-xl {
        transition: transform 0.3s ease;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>

<!-- Java Script -->
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Pembelian Tiket Film'
        },
        subtitle: {
            text: 'Source: Movie Hub'
        },
        xAxis: {
            categories: [
                @foreach($pesananfilm as $item)
                    '{{ $item->judul }}',
                @endforeach
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Tiket'
            }
        },
        
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah tiket',
            data: [
                @foreach($pesananfilm as $pesananfilms)
                    {{ $pesananfilms ->jumlah_tiket}},
                @endforeach
            ]

        }]
    });
</script>
</div>
</div>

@endsection