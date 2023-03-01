 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
 <div class="page-header mb-5 p-0" style="background-image: url({{ url('public/img/bg-detail2.jpg') }});">
     <div class="container-fluid page-header-inner-gedung py-5">
         <div class="container text-center">
             <h1 class="display-3 text-dark mb-3 animated slideInDown">{{$data['nama_gedung']}}</h1>
         </div>
     </div>
 </div>
 <!-- Page Header End -->

 <!-- Room Start -->
 <div class="container-xxl mb-5">
     <div class="container">
         <div class="row g-4">
             <div class="col-md-3">
                 <form action="{{ route('list-ruangan.showAllRoom') }}" method="POST" class="w-100">
                     @csrf
                     <div class="row g-2">
                         <div class="col-12">
                             <label>Gedung</label>
                             <select name="gedung_id" class="form-select form-select-lg rounded-3" aria-placeholder="Cari Tempat..">
                                 <option selected disabled>Pilih Lokasi</option>
                                 @if (count($data['gedung'])>0)
                                 @foreach ($data['gedung'] as $g)
                                 @php $selectedGed = $g->id == $data['selectedGedung'] ? 'selected' : '' @endphp
                                 <option value="{{$g->id}}" {{ $selectedGed }}>{{$g->nama_gedung}}</option>
                                 @endforeach
                                 @endif
                             </select>
                         </div>
                         <div class="col-12">
                             <label>Kategori</label>
                             <select name="kategori_id" class="form-select form-select-lg rounded-3">
                                 <option selected disabled>Pilih Kategori</option>
                                 @if (count($data['kategori'])>0)
                                 @foreach ($data['kategori'] as $kr)
                                 @php $selectedKat = ($kr->id == $data['selectedKategori']) ? 'selected' : '' @endphp
                                 <option value="{{$kr->id}}" {{ $selectedKat }}>{{$kr->nama_kategori}}</option>
                                 @endforeach
                                 @endif
                             </select>
                         </div>
                     </div>
                     <div class="row mt-3">
                         <div class="col-12">
                             <button type="submit" class="btn btn-primary font-weight-bold rounded-pill hvr-icon-back w-100"><i class="fa fa-search hvr-icon"></i> Filter</button>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="col-md-9">
                 <div class="col-12">
                     <p class="text-secondary">Jumlah Ruangan : {{ (count($r_OrderByStatusAsc)>0 || $data['selectedGedung'] != null || $data['selectedKategori'] != null)  ? $r_OrderByStatusAsc->total() : $all_OrderByStatusAsc->total() }}</p>
                 </div>
                 <div class="col-12">
                     @if (count($r_OrderByStatusAsc)>0 || $data['selectedGedung'] != null || $data['selectedKategori'] != null)
                     @if(count($r_OrderByStatusAsc) == 0)
                         <div class="col-8">
                             <div class="alert alert-danger" style="border-radius:25px" role="alert">
                                 <h4 class="alert-heading">Maaf!</h4>
                                 <p>Maaf, ruangan yang anda cari tidak ditemukan.</p>
                                 <hr>
                                 <p class="mb-0">Silahkan cari ruangan lainnya.</p>
                             </div>
                         </div>
                     @endif
                     @foreach ($r_OrderByStatusAsc as $r)
                     <div class="col-md-3 wow fadeInUp hvr-float mb5" data-wow-delay="0.{{substr($r->id,1,1)}}s">
                         <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                             <a href="{{ route('list-ruangan.detailRoomById', [$r->id]) }}">
                                 <div class="position-relative">
                                     <img class="img-fluid w-100" src="{{url('storage/app/post-image/'.$r->foto1)}}" alt="{{$r->nama_ruangan}}" style="border-radius: 1rem">
                                     <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$r->harga}}<span class="h6 text-primary fw-light"> / Jam</span></div>
                                 </div>
                                 <div class="p-4 mt-3">
                                     <div class="d-flex justify-content-between mb-3">
                                         <h5 class="mb-0">{{ $r->nama_ruangan }}</h5>
                                         <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$r->harga}}<span class="h6 text-primary fw-light">/ Jam</span></div>
                                     </div>
                                     <p class="text-body mb-3 fs-6">{{$r->kategoriRuangan->nama_kategori}}</p>
                                 </div>
                             </a>
                         </div>
                     </div>
                     @endforeach
                     @else
                     @foreach ($all_OrderByStatusAsc as $r)
                     <div class="col-md-3 wow fadeInUp hvr-float" data-wow-delay="0.{{substr($r->id,1,1)}}s">
                         <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                             <a href="{{ route('list-ruangan.detailRoomById', [$r->id]) }}">
                                 <div class="position-relative">
                                     <img class="img-fluid w-100" src="{{url('storage/app/post-image/'.$r->foto1)}}" alt="{{$r->nama_ruangan}}" style="border-radius: 1rem">
                                     <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$r->harga}}<span class="h6 text-primary fw-light"> / Jam</span></div>
                                 </div>
                                 <div class="p-4 mt-3">
                                     <div class="d-flex justify-content-between mb-3">
                                         <h5 class="mb-0">{{ $r->nama_ruangan }}</h5>
                                         <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$r->harga}}<span class="h6 text-primary fw-light">/ Jam</span></div>
                                     </div>
                                     <p class="text-body mb-3 fs-6">{{$r->kategoriRuangan->nama_kategori}}</p>
                                 </div>
                             </a>
                         </div>
                     </div>
                     @endforeach
                     @endif
                 </div>
                 <div class="col-12 d-flex justify-content-center align-items-center">
                     {{ $r_OrderByStatusAsc->links() }}
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Room End -->
 @endsection