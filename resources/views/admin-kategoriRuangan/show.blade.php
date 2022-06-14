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
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-between">
                                                <span class="h3 font-weight-bold">Detail Data kategori Ruangan</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-kode">Nama Kategori<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <input type="tel" class="form-control" id="val-kode" name="val-kode" disabled value="{{ $kategoriRuangan->nama_kategori }}" placeholder="Enter a username..">
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-kode">Keterangan <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <input type="tel" class="form-control" id="val-kode" name="val-kode" disabled value="{{  $kategoriRuangan->keterangan }}" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                    </form>
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