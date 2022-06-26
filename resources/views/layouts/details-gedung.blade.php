 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
        {{-- <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('storage/post-image/'.$gedung->foto) }});">  --}}
            {{-- background diambil dari foto gedung --}}
            <div class="container-fluid page-header-inner-gedung py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-dark mb-3 animated slideInDown">{{$gedung->nama_gedung}}</h1> {{-- Nama sesuai dengan nama gedung --}}
                    <p class="text-secondary px-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste provident dolores porro dolor quas velit sed molestiae impedit inventore voluptatibus?</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Ruangan Kami</h6>
                    <h1 class="mb-5"><span class="text-primary">Ruangan</span> Tersedia</h1>
                </div>
               
                 <!-- Gedung End -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    @if (count($list_ruangan)>0)
                        @foreach ($list_ruangan as $l)
                    <div class="col-md-6 col-lg-4 wow zoomIn hvr-float">
                            <div class="card p-0 shadow border h-100" style="border-radius: 1rem">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid" src="{{ asset('img/ruangan/'.$l->foto1)}}" alt="{{$l->nama_ruangan}}" style="border-radius: 1rem">
                                </div>
                                <div class="card-body">
                                    <h4 class="font-weight-bold mb-3">
                                        {{ $l->nama_ruangan }}
                                    </h4>
                                    <p class="text-body">
                                        Harga = {{ $l->harga }}
                                    </p>
                                    <p class="text-body">
                                        Kapasitas = {{ $l->kapasitas }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- ./Gedung End -->

            </div>
        </div>
        <!-- Room End -->
 @endsection