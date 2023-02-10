@extends('admin.layout')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Gedung</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $gedung->count() }}</h2>
                            <p class="text-white mb-0">{{ date('d M Y') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-building"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Ruangan</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $ruangan->count() }}</h2>
                            <p class="text-white mb-0">{{ date('d M Y') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-university"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Fasilitas</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $fasilitas->count() }}</h2>
                            <p class="text-white mb-0">{{ date('d M Y') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-rss"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Kategori Ruangan</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $kategoriRuangan->count() }}</h2>
                            <p class="text-white mb-0">{{ date('d M Y') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-hospital-o"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Grafik Peminjaman</h4>
                                    <p>Total Pendapatan</p>
                                    <h3 class="m-0 badge badge-success">@currency($sumProfit)</h3>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="sales-chart"></canvas>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-facebook">
                        <h4 class="card-title mt-4 text-white">Peminjaman Hari ini</h4>
                    </div>
                    <div class="card-body">
                        <div id="activity">
                            @if(count($peminjaman)>0)
                            @foreach($peminjaman as $row)
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ url('public/images/avatar/1.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>{{$row->nama_ruangan}}</h5>
                                    <p class="mb-0"><strong>Peminjam :</strong> {{$row->name}}</p>
                                </div><span class="text-muted "> @tgl($row->created_at)</span>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-facebook">
                        <h4 class="card-title mt-4 text-white">Feedback </h4>
                    </div>
                    <div class="card-body">
                        <div id="activity">
                            @if(count($feedback)>0)
                            @foreach($feedback as $f)
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <div class="media-body">
                                    <p class="mb-0"><strong>Feedback :</strong> <br />{{$f->keterangan_feedback}}</p>
                                    <p class="mb-0"><strong>Poin :</strong> <br />{{$f->poin}}</p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection