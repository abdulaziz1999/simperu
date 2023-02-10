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
                                    <div class="col-12 d-flex justify-content-between align-content-center">
                                        <span class="h3 font-weight-bold text-info">Detail Data Gedung</span>
                                        <!-- <a href="{{ route('gedung.index')}}" class="btn btn-lg btn-danger font-weight-bold"><i class="fa fa-arrow-circle-left "></i> Kembali</a> -->
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-12 d-flex justify-content-center">
                                        <img class="img-fluid w-50 py-2 px-2 shadow border" src="{{ asset('storage/post-image/'.$gedung->foto) }}" alt="{{ $gedung->nama_gedung}}">
                                    </div>
                                </div>
                                <div class="row mb-12">
                                    <!-- Table -->
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead >
                                                    <tr class="bg-info text-white" >
                                                        <th scope="col">Kode Gedung</th>
                                                        <th scope="col">Nama Gedung</th>
                                                        <th scope="col">Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-bold">{{ $gedung->kode}}</td>
                                                        <td class="font-weight-bold">{{ $gedung->nama_gedung}}</td>
                                                        <td class="font-weight-bold">{{ $gedung->alamat}}</td>
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
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->    


    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>
@endsection