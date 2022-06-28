 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
        <div class="container-fluid page-header p-0"> {{-- background diambil dari foto gedung --}}
            <div class="container-fluid page-header-inner-gedung pt-5">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-lg-8 pb-0">
                            <div class="row  wow fadeInUp">
                                {{-- lokasi --}}
                                <a class="text-start mt-3 mb-4 px-0" target="_blank" href="{{$ruangan->gedung->link_gmaps}}"><i class="fas fa-map-marker-alt"></i>{{ $ruangan->gedung->alamat}}</a>
                            </div>
                            <div class="row mb-5  wow fadeInUp">
                                {{-- Nama gedung --}}
                                <span class="text-start px-0 h1 text-capitalize text-dark">{{$ruangan->kategoriRuangan->nama_kategori}}</span><br/> {{-- Kategori Ruangan --}}
                                <span class="text-start px-0 h5 text-capitalize text-secondary" style="font-weight: 500">{{$ruangan->gedung->nama_gedung}}</span> {{-- Nama Ruangan --}}
                            </div>
                            <div class="row mb-5  wow fadeInUp">
                                <div class="col-lg-9 shadow border px-0 mb-3 mb-lg-0" style="border-radius: 1rem; height: 400px;">
                                    <img id="img-view" class="img-fluid w-100 h-100" src="{{ asset('storage/post-image/'.$ruangan->foto1) }}" alt="{{ $ruangan->foto1 }}" style="border-radius: 1rem; height: 100%;">
                                </div>
                                <div class="col-lg-3 d-flex flex-row flex-lg-column justify-content-between px-0 px-lg-1">
                                    <img class="img-fluid img-pass" src="{{ asset('storage/post-image/'.$ruangan->foto1)}}" alt="{{ $ruangan->foto1 }}" style="border-radius: 1rem; height: 128px;">
                                    <img class="img-fluid img-pass" src="{{ asset('storage/post-image/'.$ruangan->foto2)}}" alt="{{ $ruangan->foto2 }}" style="border-radius: 1rem; height: 128px;">
                                    <img class="img-fluid img-pass" src="{{ asset('storage/post-image/'.$ruangan->foto3)}}" alt="{{ $ruangan->foto3 }}" style="border-radius: 1rem; height: 128px;">
                                </div>
                            </div>
                            <hr/>
                            <div class="row mt-5 wow fadeInUp">
                                <h1 class="text-start h4 mb-3">
                                    Deskripsi
                                </h1>
                                <p class="text-start text-secondary">
                                    {{$ruangan->keterangan}}
                                </p>
                            </div>
                            <hr/>
                            <div class="row my-5 wow fadeInUp">
                                <div class="col-12">
                                    <h1 class="text-start h4 mb-3">
                                        Fasilitas
                                    </h1>
                                </div>
                                @if (count($ruangan->fasilitas)>0)
                                    @foreach ($ruangan->fasilitas as $f)
                                    <div class="col-lg-6 py-2">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-dark" style="width: 70px; height: 70px;">
                                                <img class="w-50" src="{{asset('storage/post-image/'.$f->foto)}}" alt="{{$f->nama_fasilitas}}">
                                            </div>
    
                                            <div class="ms-3 d-flex align-items-center p-0">
                                                <span class="h6 text-secondary">{{$f->nama_fasilitas}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <hr/>
                            <div class="row mt-5  wow fadeInUp">
                                <div class="col-12 mb-3">
                                    <h1 class="text-start h4">
                                        Lokasi
                                    </h1>
                                    <a class="d-block text-start" href="{{$ruangan->gedung->link_gmaps}}"><i class="fas fa-map-marker-alt"></i> {{ $ruangan->gedung->alamat}}</a>
                                </div>
                                <div class="col-12">
                                    <div class="w-100 p-2 border shadow" style="border-radius: 1rem; height: 450px;">
                                        <iframe class="w-100 h-100" src="{{ $ruangan->gedung->link_iframe_gmaps }}" allowfullscreen="yes" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border-radius: 1rem"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pb-5 wow bounceInDown mt-3 mt-lg-0">
                            <form action="{{ url('/checkout'.'/'.$ruangan->id) }}" method="POST" class="shadow border p-3 sticky-top" style="border-radius: 1rem; top: 1rem;" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-start text-primary" style="font-weight: 500">
                                            Pilih Ruangan
                                        </h5>
                                        <h3 class="text-start text-dark">
                                            {{ $ruangan->harga }} <span class="h6 text-secondary" style="font-weight: 500">/ Jam</span>
                                        </h3>
                                        <hr/>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-12 mb-1">
                                        <label class="text-start d-block mb-1">Tanggal Kegiatan</label>
                                        <input type="date" class="tgl form-select rounded-3 py-3" name="tgl_pinjam" id="tgl_masuk" value="{{date("Y-m-d")}}" min="{{date("Y-m-d")}}">
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-6 mb-1">
                                        <label class="text-start d-block mb-1">Waktu Kegiatan</label>
                                        <select id="waktu_peminjaman" name="jam_mulai" class="form-select rounded-3 py-3">
                                            {{-- data masuk --}}
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="text-start d-block mb-1">Durasi Kegiatan</label>
                                        <select id="durasi" name="durasi" class="form-select rounded-3 py-3">
                                            <option disabled selected>Pilih Durasi</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-12 my-1">
                                        <div class="my-2">
                                            <label class="text-start d-block mb-2">Upload File</label>
                                            <input name="dokumen" type="file" class="form-control rounded-3 py-3">
                                        </div>
                                    </div>
                                    <div class="col-12 my-1">
                                        <div class="my-2">
                                            <label class="text-start d-block mb-2">Keperluan</label>
                                            <textarea class="w-100 rounded-3 p-2" name="keperluan" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3 rounded-3" type="submit">Pesan Ruangan Ini</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-start wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-start text-primary text-uppercase">Ruangan Lainnya</h6>
                    <h1 class="mb-5">Ruangan Lainnya di <span class="text-primary">Test</span></h1>
                </div>
                <div class="row g-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-1 d-flex align-items-center">
                        <button class="btn btn-transparant btn-lg mb-3 mr-1"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <i class="fa fa-arrow-left fa-2x text-primary"></i>
                        </button>
                    </div>
                    <div class="col-md-10">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    @if (count($all_r)>0)
                                    @foreach ($all_r as $ar)
                                    <div class="col-lg-4 col-md-6 hvr-float border shadow" style="border-radius: 1rem">
                                        <a href="{{ url("/list-ruangan/detail/{$ar->id}-{$ar->nama_ruangan}")}}">
                                            <div class="position-relative">
                                                <img class="img-fluid w-100" src="{{asset('storage/post-image/'.$ar->foto1)}}" alt="{{$ar->nama_ruangan}}" style="border-radius: 1rem">
                                                <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill"><span class="text-white" style="font-size: .8rem;">{{ $ar->status }}</span><br/>{{$ar->harga}}<span class="h6 text-primary fw-light"> / Jam</span></div>
                                            </div>
                                            <div class="p-4 mt-3">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <h5 class="mb-0">{{ $ar->nama_ruangan }}</h5>
                                                    <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$ar->harga}}<span class="h6 text-primary fw-light">/ Jam</span></div>
                                                </div>
                                                <p class="text-body mb-3">#catatan : tambahkan Field Keterangan</p>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex align-items-center">
                        <button class="btn btn-transparant btn-lg mb-3 mr-1"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <i class="fa fa-arrow-right fa-2x text-primary"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Room End -->

    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            const oldImagePath = document.querySelector('#img-view').getAttribute('src');
            document.querySelectorAll('.img-pass').forEach(function (item){
                item.addEventListener('mouseover', function (){
                    document.querySelector('#img-view').setAttribute('src', this.getAttribute('src'));
                });
                item.addEventListener('mouseout', function (){
                    document.querySelector('#img-view').setAttribute('src', oldImagePath);
                });
            });
            
            $('#tgl_masuk').change(function(){
                var id=$(this).val();
                $.ajax({
                    headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                    url : "http://127.0.0.1:8000/list-ruangan/"+{{ $ruangan->id }}+"/available_date/"+id,
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var jam = '<option disabled selected>Pilih Waktu</option>';
                        data.forEach(element => {
                            if (element['jam']<10) {
                                jam += '<option value="'+element['jam']+'">0'+element['jam']+':00 WIB</option>';
                            } else {
                                jam += '<option value="'+element['jam']+'">'+element['jam']+':00 WIB</option>';
                            }
                        });
                        $('#waktu_peminjaman').html(jam);
                    }
                });
            });

            $('#waktu_peminjaman').change(function () {
                var id = $('#tgl_masuk').val();
                var this_jam = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                    },
                    url : "http://127.0.0.1:8000/list-ruangan/"+{{ $ruangan->id }}+"/available_date/"+id,
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var durasi = '';
                        const index = data.map(object => object.jam).indexOf(parseInt(this_jam));
                        for (let i = 1; i <= data[index].durasi; i++) {
                            durasi += `<option value="${i}">${i} Jam</option>`;
                        };
                        $('#durasi').html(durasi);
                    }
                });
            });

            $( document ).ready(function() {
                var arrbulan = ["1","2","3","4","5","6","7","8","9","10","11","12"];
                var date = new Date();
                var hari = date.getDay();
                var tanggal = date.getDate();
                var bulan = date.getMonth();
                var tahun = date.getFullYear();
                var tgl_skrng = tahun+"-"+arrbulan[bulan]+"-"+tanggal;

                get_json(tgl_skrng);

                function get_json(tgl) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                    url : "http://127.0.0.1:8000/list-ruangan/"+{{ $ruangan->id }}+"/available_date/"+tgl,
                    method : "POST",
                    data : {tgl: tgl},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var jam = '<option disabled selected>Pilih Waktu</option>';
                        data.forEach(element => {
                            if (element['jam']<10) {
                                jam += '<option value="'+element['jam']+'">0'+element['jam']+':00 WIB</option>';
                            } else {
                                jam += '<option value="'+element['jam']+'">'+element['jam']+':00 WIB</option>';
                            }
                        });
                        $('#waktu_peminjaman').html(jam);
                        }
                    });
                }
            });
        </script>
 @endsection