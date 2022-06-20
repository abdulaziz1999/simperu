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
                        <li class="breadcrumb-item">Ubah Data Fasilitas</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>😲</strong> Ada yang salah dengan inputan anda!<br><br>
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
                                    <form class="form-valide" action="{{ route('fasilitas.update',$fasilita->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$fasilita->id}}">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-start align-content-center">
                                                <span class="h3 font-weight-bold">Ubah Data Fasilitas</span>
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
                                            <label class="col-lg-2 col-form-label">Foto <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/post-image/'.$fasilita->foto) }}" class="img-preview img-fluid mb-3" style="max-height: 300px; max-width: 100px; ">
                                                <input class="form-control input-default" type="file" value="{{ $fasilita->foto }}" id="foto" name="foto" onchange="previewImage()" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Keterangan Fasilitas<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control input-default" name="keterangan" rows="5">{{ $fasilita->keterangan}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Ruangan <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <select class="form-control form-select" aria-label="Default select example" name="ruangan_id">
                                                    <option disabled>Pilih Ruangan </option>
                                                    @foreach ($ruangan as $r)
                                                        @php $selectedValue = $r->id == $fasilita->ruangan_id ? 'selected' : '' @endphp
                                                        <option value="{{$r->id}}" {{$selectedValue}} > {{$r->nama_ruangan}}</option>
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