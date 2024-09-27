@extends('layouts.frontend.masteradmin')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Dashboard Admin Dharmawangsa Tour</h3>
                <p class="panel-subtitle">Updated to : {{ date('d-m-Y H:i:s') }}
                </p>
            </div>
            <div class="panel-body">
                <div class="row" id="chartpengunjung">

                </div>
                {{-- <div class="row">
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-users"></i></span>
                            <p>
                                <span class="number"></span>
                                <span class="title">Mahasiswa Terdaftar</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-cog"></i></span>
                            <p>
                                <span class="number"></span>
                                <span class="title">Mahasiswa Sudah Konsultasi</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-book"></i></span>
                            <p>
                                <span class="number"></span>
                                <span class="title">Mata Kuliah</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-inbox"></i></span>
                            <p>
                                <span class="number"></span>
                                <span class="title">Domain</span>
                            </p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

</div>

@endsection
@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartpengunjung', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Pengunjung Tahunan'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Pengunjung',
        data: {{ json_encode($jumlah) }}
        // data: [0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 18]

    }]
});

</script>
@endsection