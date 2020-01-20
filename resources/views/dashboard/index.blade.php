@extends('layouts/klorofil')
@section('title','Dashboard')
@section('content')

<!-- OVERVIEW -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jumlah Pegawai Berdasarkan Gender</h3>
                            <p class="panel-subtitle">Last Input : {{ lastUserId() }}</p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    {{-- panggil chart dataPegawai --}}
                                    <div id="dataPegawai"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="weekly-summary text-right">
                                        <span class="number">{{ countPegawai() }}</span> <span class="percentage"><i class="fa fa-caret-up text- success"></i> orang</span>
                                        <span class="info-label">Total Pegawai</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
</div>
@endsection

{{-- cart cdn --}}
@section('chart')
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script>
        Highcharts.chart('dataPegawai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Perbandingan Jumlah Pegawai Laki-laki dan Perempuan'
            },
            subtitle: {
                text: 'Sistem Informasi Kepegawaian'
            },
            xAxis: {
                categories: ["Laki-laki","Perempuan"],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pegawai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px"></span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} Orang</b></td></tr>',
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
                name: 'Jumlah Pegawai',
                data: [{{ countPegawaiPria() }},{{ countPegawaiWanita() }}]
            }]
        });
    </script>
@endsection
