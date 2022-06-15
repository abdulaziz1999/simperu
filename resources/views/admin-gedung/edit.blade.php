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
                        <li class="breadcrumb-item">Edit Data Gedung</li>
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
                                    <form  action="{{route('gedung.update',$gedung->id)}}" method="post" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$gedung->id}}">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-between">
                                                <span class="h3 font-weight-bold">Edit Data Gedung</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-kode">Kode <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="tel" class="form-control input-default" id="val-kode" name="kode" value="{{ $gedung->kode }}" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-kode">Nama <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="tel" class="form-control input-default" id="val-kode" name="nama_gedung" value="{{ $gedung->nama_gedung }}" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control input-default" id="val-suggestions" name="alamat" rows="5" placeholder="What would you like to see?"> {{ $gedung->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Foto <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-5">
                                            <img src="{{asset('storage/post-image/'.$gedung->foto)}}" class="img-preview img-fluid mb-3">
                                            </div>
                                            <div class="col-lg-5">
                                                <input type="file" class="form-control input-default" id="val-kode" name="foto" value="{{ $gedung->foto }}" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary btn-md btn-block text-white font-weight-bold py-3 px-5">Edit</button>
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