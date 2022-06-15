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
                        <li class="breadcrumb-item"><a href="{{ route('ruangan.index')}}" class="text-primary">Daftar Ruangan</a></li>
                        <li class="breadcrumb-item">Tambah Data Ruangan</li>
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
                                    <form class="form-valide" action="{{ route('ruangan.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-start align-content-center">
                                                <span class="h3 font-weight-bold">Tambah Data ruangan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-kode">Nama Ruangan <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="tel" class="form-control input-default" id="val-kode" name="nama_ruangan" placeholder="Nama Ruangan">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-skill">Kategori Ruangan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="kategori_ruangan_id">
                                                    <option value="">- Pilih Kategori Ruangan -</option>
                                                    @foreach($kategoriRuangan as $kat)
                                                    <option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-skill">Gedung<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="gedung_id">
                                                    <option value="">- Pilih Gedung -</option>
                                                    @foreach($gedung as $g)
                                                    <option value="{{$g->id}}">{{$g->nama_gedung}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-nama">Kapasitas<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="tel" class="form-control input-default" id="val-nama" name="kapasitas" placeholder="Kapasitas">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-nama">Lantai<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="tel" class="form-control input-default" id="val-nama" name="lantai" placeholder="Lantai">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-skill">Status<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="status">
                                                <option value="">- Pilih Status -</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Dipinjam">Dipinjam</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-nama">Harga<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control input-default" id="val-nama" name="harga" placeholder="Harga">
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Keterangan
                                            </label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control input-default" id="val-alamat" name="keterangan" rows="5" placeholder="Keterangan"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-suggestions">Foto1<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-4">
                                            <img src="{{asset('storage/post-image/default.jpg')}}" class="img-preview img-fluid mb-3" style="display: none; max-height: 300px; max-width: 100px; ">
                                            <input class="form-control input-default" type="file" name="foto1" onchange="previewImage()">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-suggestions">Foto2
                                            </label>
                                            <div class="col-lg-4">
                                                <img src="{{asset('storage/post-image/default.jpg')}}" class="img-preview img-fluid mb-3" style="display: none; max-height: 300px; max-width: 100px; ">
                                                <input class="form-control input-default" type="file" name="foto2" onchange="previewImage()">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="val-suggestions">Foto3
                                                </label>
                                                <div class="col-lg-4">
                                                    <img src="{{asset('storage/post-image/default.jpg')}}" class="img-preview img-fluid mb-3" style="display: none; max-height: 300px; max-width: 100px; ">
                                                    <input class="form-control input-default" type="file" name="foto3" onchange="previewImage()">
                                                </div>
                                                </div>
                                        <div class="form-group row mt-5">
                                            <div class="col-12 d-flex justify-content-end">
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