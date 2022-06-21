@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0 d-flex align-items-center">
                <div class="col-md-2">
                    <a href="{{ route('kategoriRuangan.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kategoriRuangan.index')}}" class="text-primary">Daftar Kategori Ruangan</a></li>
                        <li class="breadcrumb-item">Detail Data Kategori Ruangan</li>
                    </ol>
                </div>
            </div>
            <!-- row -->
<div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- heading --}}
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <span class="h3 font-weight-bold text-primary">Detail Kategori Ruangan</span>
                                    </div>
                                </div>
                                {{-- keterangan --}}
                                <div class="row mb-5 d-flex align-items-md-center">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <span class="h4 font-weight-light text-black-50">Nama Kategori Ruangan : </span>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="h4 font-weight-bold">{{ $kategoriRuangan->nama_kategori }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <span class="h4 font-weight-light text-black-50">Keterangan :</span>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="h4 font-weight-bold">{{ $kategoriRuangan->keterangan }}</span>
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
        </div>
        <!--**********************************
            Content body end
        ***********************************-->    
@endsection