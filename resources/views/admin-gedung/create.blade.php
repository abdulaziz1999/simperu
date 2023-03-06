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
                <li class="breadcrumb-item"><a href="{{ route('gedung.index')}}" class="text-primary">Daftar Gedung</a>
                </li>
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
                            <form class="form-valide" action="{{ route('gedung.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 d-flex justify-content-start align-content-center">
                                        <span class="h3 font-weight-bold text-info">Tambah Data Gedung</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-kode">Kode <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control input-default" id="val-kode" name="kode" placeholder="Masukan Kode Gedung...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-nama">Nama <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-nama" name="nama_gedung" placeholder="Masukan Nama Gedung...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control input-default" id="val-alamat" name="alamat" rows="5" placeholder="Masukan Alamat Gedung..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Link Google Maps <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control input-default" id="val-kode" name="link_gmaps">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Link Frame Google Maps
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control input-default" id="val-kode" name="link_iframe_gmaps">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Foto <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input class="form-control input-default" type="file" id="foto" name="foto" onchange="previewImage()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">
                                    </label>
                                    <div class="col-lg-10">
                                        <img src="{{asset('public/img/default.png')}}" class="img-preview img-thumbnail img-fluid mb-3" style="display: none; max-height: 300px; max-width: 200px; ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-2"></div>
                                    <div class="col-5 d-flex justify-content-start">
                                        <button type="submit" class="btn btn-md btn-primary btn-round text-white font-weight-bold py-2 px-3">
                                            <i class="fa fa-save"></i>&nbsp; Simpan</button>
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
<script>
    function previewImage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection