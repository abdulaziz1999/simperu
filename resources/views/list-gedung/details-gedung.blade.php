@extends('layouts.layout')
@section('content')
<!-- Page Header Start -->
<div class="page-header mb-5 p-0" style="background-image: url({{ url('storage/app/post-image/'.$gedung->foto) }});"> 
    <div class="container-fluid page-header-inner-gedung py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-dark mb-3 animated slideInDown">{{$gedung->nama_gedung}}</h1> {{-- Nama sesuai dengan nama gedung --}}
            <p class="text-secondary px-5">Rasakan pengalaman yang menghadirkan nuansa alam dan warna earthy di tengah padatnya area di {{$gedung->nama_gedung}}.</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Room Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @if (count($list_ruangan)>0)
            @foreach ($list_ruangan as $l)
            <div class="col-md-6 col-lg-4 wow zoomIn hvr-float" data-wow-delay="0.{{substr($l->id,1,1)}}s">
                <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                    <a href="{{ route('list-ruangan.detailRoomById', [$l->id])}}">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{url('storage/app/post-image/'.$l->foto1)}}" alt="{{$l->nama_ruangan}}" style="border-radius: 1rem">
                            <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$l->harga}}<span class="h6 text-primary fw-light"> / Jam</span></div>
                        </div>
                        <div class="p-4 mt-3">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $l->nama_ruangan }}</h5>
                                <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$l->harga}}<span class="h6 text-primary fw-light">/ Jam</span></div>
                            </div>
                            <p class="text-body mb-3 fs-4">{{$l->kategoriRuangan->nama_kategori}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center align-items-center">
                {{ $list_ruangan->links() }}
            </div>
        </div>
    </div>
</div>
<!-- ./Room Start -->
 @endsection