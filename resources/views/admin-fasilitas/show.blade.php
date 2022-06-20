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
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <span class="h3 font-weight-bold">Detail Data Fasilitas</span>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-12 d-flex justify-content-center border" style="background-image: url('{{ asset('storage/post-image/'.$fasilita->foto) }}');
                                    background-repeat: no-repeat;
                                    background-size: cover;

                                    height: 250px;
                                        ">
                                        {{-- <img class="img-fluid w-50 py-2 px-2 shadow border" src="{{ asset('storage/post-image/'.$fasilita->foto) }}" alt="{{ $fasilita->nama_fasilitas}}"> --}}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="h3 font-weight-light text-black-50">
                                            Nama Fasilitas:
                                        </span>
                                        <span class="h3 font-weight-bold">
                                            {{ $fasilita->nama_fasilitas}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="h3 font-weight-light text-black-50">
                                            Ruangan :
                                        </span>
                                        <span class="h3 font-weight-bold">
                                            {{ $fasilita->ruangan->nama_ruangan}}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="h3 font-weight-light text-black-50">
                                            Keterangan :
                                        </span><br />
                                        <span class="h3 font-weight-bold">
                                            {{ $fasilita->keterangan}}
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