 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
        <div class="page-header mb-5 p-0" style="background-image: url({{ asset('img/carousel-1.jpg') }});"> {{-- background diambil dari foto gedung --}}
            <div class="container-fluid page-header-inner-gedung py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-dark mb-3 animated slideInDown">Ruangan</h1> {{-- Nama sesuai dengan nama gedung --}}
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    @if (count($r_OrderByStatusAsc)>0)
                    @foreach ($r_OrderByStatusAsc as $r)
                    <div class="col-lg-4 col-md-6 wow fadeInUp hvr-float" data-wow-delay="0.{{substr($r->id,1,1)}}s">
                        <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                            <a href="{{ route('list-ruangan.detailRoomById', [$r->id]) }}">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{asset('storage/post-image/'.$r->foto1)}}" alt="{{$r->nama_ruangan}}" style="border-radius: 1rem">
                                    <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$r->harga}}<span class="h6 text-primary fw-light"> / Jam</span></div>
                                </div>
                                <div class="p-4 mt-3">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $r->nama_ruangan }}</h5>
                                        <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{$r->harga}}<span class="h6 text-primary fw-light">/ Jam</span></div>
                                    </div>
                                    <p class="text-body mb-3 fs-4">{{$r->kategoriRuangan->nama_kategori}}</p>
                                </div>
                            </a>
                        </div>
                    </div>        
                        @endforeach
                    @endif
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        {{ $r_OrderByStatusAsc->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Room End -->
 @endsection