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
                        <li class="breadcrumb-item"><a href="{{ url('/admin-kategoriRuangan')}}" class="text-primary">Daftar kategori Ruangan</a></li>
                        <li class="breadcrumb-item">Detail Data kategori Ruangan</li>
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
                                        <span class="h4 font-weight-bold">Detail Data kategori Ruangan</span>
                                        <a href="{{ route('ruangan.index')}}" class="btn btn-lg btn-danger font-weight-bold"><i class="fa fa-arrow-circle-left "></i> Kembali</a>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Nama Kategori : 
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $kategoriRuangan->nama_kategori }}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <span class="h4 font-weight-light text-black-50">
                                            Keterangan :
                                        </span>
                                        <span class="h4 font-weight-bold">
                                            {{ $kategoriRuangan->keterangan}}
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