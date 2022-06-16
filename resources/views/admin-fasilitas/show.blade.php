@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0 d-flex align-items-center">
                <div class="col-md-2">
                    <a href="{{ route('fasilitas.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('fasilitas.index')}}" class="text-primary">Daftar Fasilitas</a></li>
                        <li class="breadcrumb-item">Detail Data Fasilitas</li>
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
                                        <span class="h3 font-weight-bold text-primary">Detail Data Fasilitas</span>
                                    </div>
                                </div>
                                {{-- keterangan --}}
                                <div class="row mb-5 d-flex align-items-md-center">
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <span class="h4 font-weight-light text-black-50">Nama Fasilitas : </span>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="h4 font-weight-bold">{{ $fasilita->nama_fasilitas}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <span class="h4 font-weight-light text-black-50">Ruangan :</span>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="h4 font-weight-bold">{{ $fasilita->ruangan->nama_ruangan}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <span class="h4 font-weight-light text-black-50">Keterangan :</span>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="h4 font-weight-bold">{{ $fasilita->keterangan}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-center border" style="background-image: url('{{ asset('storage/post-image/'.$fasilita->foto) }}');
                                        background-repeat: repeat;
                                        background-size: cover;
                                        height: 250px;
                                        ">
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