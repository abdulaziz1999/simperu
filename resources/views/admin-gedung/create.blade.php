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
                        <li class="breadcrumb-item"><a href="{{ url('/admin-gedung')}}" class="text-primary">Daftar Gedung</a></li>
                        <li class="breadcrumb-item">Tambah Data Gedung</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('gedung.store') }}" method="post">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-between">
                                                <span class="h3 font-weight-bold">Tambah Data Gedung</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-kode">Kode <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <input type="tel" class="form-control" id="val-kode" name="kode" placeholder="Enter a username..">
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-kode">Nama <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <input type="tel" class="form-control" id="val-kode" name="nama_gedung" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <textarea class="form-control" id="val-suggestions" name="alamat" rows="5" placeholder="What would you like to see?"></textarea>
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Foto <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="foto" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success text-white font-weight-bold py-3 px-5">Simpan</button>
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