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
                        <li class="breadcrumb-item"><a href="{{ route('gedung.index')}}" class="text-primary">Daftar Gedung</a></li>
                        <li class="breadcrumb-item">Detail Data Gedung</li>
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
                                        <span class="h3 font-weight-bold">Detail Data Gedung</span>
                                        <a href="{{ route('gedung.index')}}" class="btn btn-lg btn-danger font-weight-bold"><i class="fa fa-arrow-circle-left "></i> Kembali</a>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-12 d-flex justify-content-center">
                                        <img class="img-fluid w-50 py-2 px-2 shadow border" src="{{ asset('storage/post-image/'.$gedung->foto) }}" alt="{{ $gedung->nama_gedung}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="h3 font-weight-light text-black-50">
                                            Kode Gedung:
                                        </span>
                                        <span class="h3 font-weight-bold">
                                            {{ $gedung->kode}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="h3 font-weight-light text-black-50">
                                            Nama Gedung :
                                        </span>
                                        <span class="h3 font-weight-bold">
                                            {{ $gedung->nama_gedung}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="h3 font-weight-light text-black-50">
                                            Alamat Gedung :
                                        </span><br />
                                        <span class="h3 font-weight-bold">
                                            {{ $gedung->alamat}}
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