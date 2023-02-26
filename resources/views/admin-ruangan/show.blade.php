@extends('admin.layout')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ruangan.index')}}" class="text-primary">Daftar Ruangan</a></li>
                <li class="breadcrumb-item">Detail Data Ruangan</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-12 d-flex justify-content-between flex-row-reverse align-content-center">
                                <span class="h4 font-weight-bold">Detail Data ruangan</span>
                                <a href="{{ route('ruangan.index')}}" class="btn btn-lg btn-danger font-weight-bold"><i class="fa fa-arrow-circle-left "></i> Kembali</a>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-4 d-flex justify-content-center">
                                <img class="img-fluid shadow border rounded" src="{{ url('storage/app/post-image/'.$ruangan->foto1)}}" width="500px">
                            </div>
                            <div class="col-md-4 d-flex justify-content-center">
                                <img class="img-fluid shadow border rounded" src="{{ url('storage/app/post-image/'.$ruangan->foto2)}}" width="500px">
                            </div>
                            <div class="col-md-4 d-flex justify-content-center">
                                <img class="img-fluid shadow border rounded" src="{{ url('storage/app/post-image/'.$ruangan->foto3)}}" width="500px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="bg-info text-white">
                                                <th scope="col">Nama Ruangan</th>
                                                <th scope="col">Kategori Ruangan</th>
                                                <th scope="col">Gedung</th>
                                                <th scope="col">Kapasitas</th>
                                                <th scope="col">Lantai</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Fasilitas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">{{ $ruangan->nama_ruangan}}</td>
                                                <td class="font-weight-bold">{{ $kategoriRuangan->nama_kategori}}</td>
                                                <td class="font-weight-bold">{{ $gedung->nama_gedung}}</td>
                                                <td class="font-weight-bold">{{ $ruangan->kapasitas}}</td>
                                                <td class="font-weight-bold">{{ $ruangan->lantai}}</td>
                                                <td class="font-weight-bold">{{ $ruangan->status}}</td>
                                                <td class="font-weight-bold">{{ $ruangan->harga}}</td>
                                                <td class="font-weight-bold">
                                                    <ul>
                                                        @if($fasilitas == null || $fasilitas == '' || $fasilitas == '[]')
                                                            <li>Fasilitas Belum Ditambahakan</li>
                                                        @else
                                                            @foreach($fasilitas as $fasilitas)
                                                            <li> - {{ $fasilitas->nama_fasilitas}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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


<script src="./plugins/validation/jquery.validate.min.js"></script>
<script src="./plugins/validation/jquery.validate-init.js"></script>
@endsection