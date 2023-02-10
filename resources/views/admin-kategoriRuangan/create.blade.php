@extends('admin.layout')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="row page-titles mx-0 d-flex align-items-center">
        <div class="col-md-2">
            <a href="{{ route('kategoriRuangan.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
        </div>
        <div class="col-md-10 p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kategoriRuangan.index')}}" class="text-primary">Daftar Kategori Ruangan</a></li>
                <li class="breadcrumb-item">Tambah Data Kategori Ruangan</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
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
                            <form class="form-valide" action="{{ route('kategoriRuangan.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class="h3 font-weight-bold text-primary">Tambah Data Kategori Ruangan</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-kode">Nama Kategori<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-kode" name="nama_kategori" placeholder="Nama Kategori">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-kode">Keterangan <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-kode" name="keterangan" placeholder="Keterangan">
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <div class="col-lg-2">
                                        {{-- spasi --}}
                                    </div>
                                    <div class="col-lg-10 d-flex justify-content-center justify-content-lg-start">
                                        <button type="submit" class="btn btn-md btn-primary text-white font-weight-bold">Simpan</button>
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
@endsection