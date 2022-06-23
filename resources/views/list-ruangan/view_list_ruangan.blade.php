 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
        <div class="page-header mb-5 p-0" style="background-image: url({{ asset('img/carousel-1.jpg') }});"> {{-- background diambil dari foto gedung --}}
            <div class="container-fluid page-header-inner-gedung py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-dark mb-3 animated slideInDown">Daftar Ruangan</h1> {{-- Nama sesuai dengan nama gedung --}}
                    <p class="text-secondary px-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste provident dolores porro dolor quas velit sed molestiae impedit inventore voluptatibus?</p>
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
                        <div class="col-lg-4 col-md-6 wow fadeInUp @if ($r->status == 'Tersedia') hvr-float @endif" data-wow-delay="0.1s" @if ($r->status == 'Dipinjam') style="filter: grayscale(1)"@endif>
                        <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                            @if ($r->status == 'Dipinjam')
                            <div class="d-inline">
                            @else
                            <a href="{{ url("/list-ruangan/detail/{$r->id}-{$r->nama_ruangan}")}}">
                            @endif
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{asset('storage/post-image/'.$r->foto1)}}" alt="{{$r->nama_ruangan}}" style="border-radius: 1rem">
                                    <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill"><span class="text-white" style="font-size: .8rem;">{{ $r->status }}</span><br/>{{$r->harga}}<span class="h6 text-primary fw-light"> / Jam</span></div>
                                </div>
                                <div class="p-4 mt-3">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $r->nama_ruangan }}</h5>
                                        <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">Rp. {{$r->harga}}<span class="h6 text-primary fw-light">/ Jam</span></div>
                                    </div>
                                    <p class="text-body mb-3">#catatan : tambahkan Field Keterangan</p>
                                </div>
                            @if ($r->status == 'Dipinjam')
                            </div>
                            @else
                            </a>
                            @endif
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