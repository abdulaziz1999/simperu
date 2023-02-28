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
                <li class="breadcrumb-item">Edit Data Ruangan</li>
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
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{route('ruangan.update',$ruangan->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="old-image1" value="{{$ruangan->foto1}}">
                                <input type="hidden" name="old-image2" value="{{$ruangan->foto2}}">
                                <input type="hidden" name="old-image3" value="{{$ruangan->foto3}}">
                                <div class="form-group row">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class="h3 font-weight-bold">Edit Data ruangan</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-kode">Nama Ruangan <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-kode" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" placeholder="Nama Ruangan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-skill">Kategori Ruangan<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="kategori_ruangan_id">
                                            <option value="">- Pilih Kategori Ruangan -</option>
                                            @foreach($kategoriRuangan as $kat)
                                            @php $selectedKat = $kat->id == $ruangan->kategori_ruangan_id ? 'selected' : '' @endphp
                                            <option value="{{$kat->id}}" {{ $selectedKat }}>{{$kat->nama_kategori}}</option>
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
                                            @php $selectedG = $g->id == $ruangan->gedung_id ? 'selected' : '' @endphp
                                            <option value="{{$g->id}}" {{ $selectedG }}>{{$g->nama_gedung}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-nama">Kapasitas<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-nama" name="kapasitas" value="{{ $ruangan->kapasitas }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-nama">Lantai<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="tel" class="form-control input-default" id="val-nama" name="lantai" value="{{ $ruangan->lantai }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-skill">Status<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="status">
                                            <option value="">- Pilih Status -</option>
                                            @php if($ruangan->status == 'Tersedia'): @endphp
                                            <option value="Tersedia" selected>Tersedia</option>
                                            <option value="Dipinjam"> Dipinjam</option>
                                            @php elseif($ruangan->status == 'Dipinjam'): @endphp
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Dipinjam" selected>Dipinjam</option>
                                            @php else: @endphp
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Dipinjam">Dipinjam</option>
                                            @php endif; @endphp
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-nama">Harga<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        <input type="number" class="form-control input-default" id="val-nama" name="harga" value="{{ $ruangan->harga }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Keterangan
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control input-default" name="keterangan" rows="5">{{$ruangan->keterangan}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-skill">Fasilitas<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-10">
                                        @foreach($fasilitas as $f)
                                        @php $checked = in_array($f->id, $ruangan->fasilitas()->pluck('fasilitas_id')->toArray()) ? 'checked' : '' @endphp
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{$f->id}}" {{$checked}} >{{$f->nama_fasilitas}}
                                            </label>
                                            &nbsp;
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Foto1<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-4">
                                        <img alt="{{$ruangan->foto1}}" src="{{url('storage/app/post-image/'.$ruangan->foto1)}}" id="foto1" class="img-fluid mb-3" style="max-height: 300px; max-width: 100px; ">
                                        <input class="foto form-control input-default" type="file" name="foto1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Foto2
                                    </label>
                                    <div class="col-lg-4">
                                        <img alt="{{$ruangan->foto2}}" src="{{url('storage/app/post-image/'.$ruangan->foto2)}}" id="foto2" class="img-fluid mb-3" style="max-height: 300px; max-width: 100px; ">
                                        <input class="foto form-control input-default" type="file" name="foto2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="val-suggestions">Foto3
                                    </label>
                                    <div class="col-lg-4">
                                        <img alt="{{$ruangan->foto3}}" src="{{url('storage/app/post-image/'.$ruangan->foto3)}}" id="foto3" class="img-fluid mb-3" style="max-height: 300px; max-width: 100px; ">
                                        <input class="foto form-control input-default" type="file" name="foto3">
                                    </div>
                                </div>
                                <input type="hidden" name="oldimage1" value="{{$ruangan->foto1}}">
                                <input type="hidden" name="oldimage2" value="{{$ruangan->foto2}}">
                                <input type="hidden" name="oldimage3" value="{{$ruangan->foto3}}">
                                <div class="form-group row">
                                    <div class="col-2"></div>
                                    <div class="col-5 d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary btn-md text-white font-weight-bold py-2 px-3"> <i class="fa fa-pencil"></i>&nbsp; Edit</button>
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
    document.querySelectorAll('.foto').forEach(function(item) {
        item.addEventListener('change', function() {
            const imagePreview = document.querySelector(`#${this.getAttribute('name')}`);
            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(this.files[0]);
            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        });
    });
</script>

@endsection