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
                        <li class="breadcrumb-item"><a href="{{ route('fasilitas.index')}}" class="text-primary">Daftar Gedung</a></li>
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
                                    <form class="form-valide" action="{{ route('fasilitas.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-start align-content-center">
                                                <span class="h3 font-weight-bold">Tambah Data Fasilitas</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Nama Fasilitas <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control input-default" name="nama_fasilitas" placeholder="Masukan Nama Fasilitas...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Foto <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <img src="{{asset('storage/post-image/default.jpg')}}" class="img-preview img-fluid mb-3" style="display: none; max-height: 300px; max-width: 100px; ">
                                                <input class="form-control input-default" type="file" id="foto" name="foto" onchange="previewImage()">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Keterangan Fasilitas<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control input-default" name="keterangan" rows="5" placeholder="Masukan Keterangan Fasilitas..."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Ruangan <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <select class="form-control form-select" aria-label="Default select example" name="ruangan_id">
                                                    <option selected disabled>Pilih Ruangan</option>
                                                    @foreach ($ruangan as $r)
                                                        <option value="{{$r->id}}">{{$r->nama_ruangan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <div class="col-12 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-md btn-primary text-white font-weight-bold py-3 px-5">Simpan</button>
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
                oFReader.onload = function (oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
@endsection