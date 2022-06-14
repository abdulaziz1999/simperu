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
<<<<<<< HEAD
                        <li class="breadcrumb-item">Tambah Data Gedung</li>
=======
                        <li class="breadcrumb-item">Edit Data Gedung</li>
>>>>>>> 64c5af523f8bd0e2ded10d2c342848378dc48624
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
<<<<<<< HEAD
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-between">
                                                <span class="h3 font-weight-bold">Tambah Data Gedung</span>
=======
                                    <form  action="{{route('gedung.update',$gedung->id)}}" method="post" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$gedung->id}}">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-between">
                                                <span class="h3 font-weight-bold">Edit Data Gedung</span>
>>>>>>> 64c5af523f8bd0e2ded10d2c342848378dc48624
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-kode">Kode <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
<<<<<<< HEAD
                                                <input type="tel" class="form-control" id="val-kode" name="val-kode" value="" placeholder="Enter a username..">
=======
                                                <input type="tel" class="form-control" id="val-kode" name="kode" value="{{ $gedung->kode }}" placeholder="Enter a username..">
>>>>>>> 64c5af523f8bd0e2ded10d2c342848378dc48624
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-kode">Nama <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
<<<<<<< HEAD
                                                <input type="tel" class="form-control" id="val-kode" name="val-kode" placeholder="Enter a username..">
=======
                                                <input type="tel" class="form-control" id="val-kode" name="nama_gedung" value="{{ $gedung->nama_gedung }}" placeholder="Enter a username..">
>>>>>>> 64c5af523f8bd0e2ded10d2c342848378dc48624
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
<<<<<<< HEAD
                                                <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="What would you like to see?"></textarea>
=======
                                                <textarea class="form-control" id="val-suggestions" name="alamat" rows="5" placeholder="What would you like to see?"> {{ $gedung->alamat }}</textarea>
>>>>>>> 64c5af523f8bd0e2ded10d2c342848378dc48624
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Foto <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
<<<<<<< HEAD
                                                <input type="file" class="form-control" id="val-kode" name="val-kode" placeholder="Enter a username..">
=======
                                                <input type="text" class="form-control" id="val-kode" name="foto" value="{{ $gedung->foto }}" placeholder="Enter a username..">
>>>>>>> 64c5af523f8bd0e2ded10d2c342848378dc48624
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


<<<<<<< HEAD
    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>
=======
>>>>>>> 64c5af523f8bd0e2ded10d2c342848378dc48624
@endsection