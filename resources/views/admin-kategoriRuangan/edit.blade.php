@extends('admin.layout')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col-md-2">
            <a href="{{ route('kategoriRuangan.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
        </div>
        <div class="col-md-10 p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kategoriRuangan.index')}}" class="text-primary">Daftar Kategori Ruangan</a></li>
                <li class="breadcrumb-item">Edit Kategori Ruangan</li>
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
                            <form action="{{ route('kategoriRuangan.update',$kategoriRuangan->id) }}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$kategoriRuangan->id}}">
                                <div class="form-group row">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class="h3 font-weight-bold text-primary">Edit Data Kategori Ruangan</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-kode">Nama Kategori<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-kode" name="nama_kategori" value="{{ $kategoriRuangan->nama_kategori }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-kode">Keterangan <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-kode" name="keterangan" value="{{ $kategoriRuangan->keterangan}}">
                                    </div>
                                </div>

                                <div class="form-group row">
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