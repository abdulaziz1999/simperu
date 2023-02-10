@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0 d-flex align-items-center">
                <div class="col-md-2">
                    <a href="{{ route('fasilitas.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('fasilitas.index')}}" class="text-primary">Daftar Fasilitas</a></li>
                        <li class="breadcrumb-item">Ubah Data Fasilitas</li>
                    </ol>
                </div>
            </div>            <!-- row -->

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
                                    <form class="form-valide" action="{{ route('fasilitas.update', $fasilita->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <input type="hidden" name="old-image" value="{{$fasilita->foto}}">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-start align-content-center">
                                                <span class="h3 font-weight-bold text-primary">Ubah Data Fasilitas</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Nama Fasilitas <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control input-default" name="nama_fasilitas" value="{{ $fasilita->nama_fasilitas}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Foto <span class="text-danger">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control input-default" type="file" value="{{ $fasilita->foto }}" id="foto" name="foto" onchange="previewImage()" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">
                                            </label>
                                            <div class="col-lg-10">
                                                <img src="{{ url('storage/app/post-image/'.$fasilita->foto) }}" class="img-preview img-thumbnail img-fluid mb-3" style="max-height: 300px; max-width: 100px; ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Keterangan Fasilitas<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control input-default" name="keterangan" rows="5">{{ $fasilita->keterangan}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <div class="col-lg-2">
                                                {{-- spasi --}}
                                            </div>
                                            <div class="col-lg-10 d-flex justify-content-center justify-content-lg-start">
                                                <button type="submit" class="btn btn-md btn-primary text-white font-weight-bold py-2 px-3"> <i class="fa fa-pencil"></i> Ubah</button>
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