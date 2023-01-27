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
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Nama Ruangan : 
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $ruangan->nama_ruangan}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Kategori Ruangan :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $kategoriRuangan->nama_kategori}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Gedung :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $gedung->nama_gedung}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Kapasitas :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $ruangan->kapasitas}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Lantai :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $ruangan->lantai}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Status :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $ruangan->status}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Harga :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $ruangan->harga}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Keterangan :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $ruangan->keterangan}}
                                        </span>
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