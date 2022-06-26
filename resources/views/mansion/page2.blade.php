 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('storage/post-image/'.$gedung->foto) }});"> {{-- background diambil dari foto gedung --}}
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
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp hvr-float" data-wow-delay="0.1s">
                        <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                            <a href="#">
                                <div class="position-relative">
                                    <img class="img-fluid w-100"  src="/img/ruangan/{{ $ruangan->foto1 }}" alt="" style="border-radius: 1rem">
                                    <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">Rp. 20,000 <span class="h6 text-primary fw-light">/ 5 Jam</span></div>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $ruangan->nama_ruangan}}</h5>
                                        <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">{{ $ruangan->harga}}<span class="h6 text-primary fw-light">/ 1 hari</span></div>
                                    </div>
                                    <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-6 wow fadeInUp hvr-float" data-wow-delay="0.1s">
                        <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                            <a href="#">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{asset('img/room-1.jpg')}}" alt="" style="border-radius: 1rem">
                                    <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">Rp. 20,000 <span class="h6 text-primary fw-light">/ 5 Jam</span></div>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">Junior Suite</h5>
                                        <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">Rp. 20,000 <span class="h6 text-primary fw-light">/ 5 Jam</span></div>
                                    </div>
                                    <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp hvr-float" data-wow-delay="0.1s">
                        <div class="p-0 shadow border h-100" style="border-radius: 1rem">
                            <a href="#">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{asset('img/room-1.jpg')}}" alt="" style="border-radius: 1rem">
                                    <div class="d-none d-sm-block h5 position-absolute start-0 top-100 translate-middle-y bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">Rp. 20,000 <span class="h6 text-primary fw-light">/ 5 Jam</span></div>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">Junior Suite</h5>
                                        <div class="d-sm-none h6 bg-dark text-white rounded py-2 px-4 ms-3 rounded-pill">Rp. 20,000 <span class="h6 text-primary fw-light">/ 5 Jam</span></div>
                                    </div>
                                    <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                </div>
                            </a>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
        <!-- Room End -->
 @endsection