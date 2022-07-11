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
                                <a class="text-start mt-3 mb-4 px-0" href="#"><i class="fas fa-map-marker-alt"></i> Jalan Lorem ipsum dolor sit amet.</a>
                            </div>
                            <div class="row mb-5  wow fadeInUp">
                                {{-- Nama Ruangan --}}
                                <span class="text-start px-0 h1 text-capitalize text-dark">Lorem, ipsum dolor.</span><br/>
                                <span class="text-start px-0 h5 text-capitalize text-secondary" style="font-weight: 500">Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="row mb-5  wow fadeInUp">
                                <div class="col-lg-9 shadow border px-0 mb-3 mb-lg-0" style="border-radius: 1rem">
                                    <img id="img-view" class="img-fluid w-100" src="{{ asset('img/carousel-1.jpg')}}" alt="" style="border-radius: 1rem">
                                </div>
                                <div class="col-lg-3 d-flex flex-row flex-lg-column justify-content-between px-0 px-lg-1">
                                    <img class="img-fluid img-pass" src="{{ asset('img/carousel-2.jpg')}}" alt="" style="border-radius: 1rem; max-height: auto;">
                                    <img class="img-fluid img-pass" src="{{ asset('img/carousel-1.jpg')}}" alt="" style="border-radius: 1rem; max-height: auto;">
                                    <img class="img-fluid img-pass" src="{{ asset('img/carousel-1.jpg')}}" alt="" style="border-radius: 1rem; max-height: auto;">
                                </div>
                            </div>
                            <hr/>
                            <div class="row mt-5 wow fadeInUp">
                                <h1 class="text-start h4 mb-3">
                                    Deskripsi
                                </h1>
                                <p class="text-start text-secondary">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, sint.
                                </p>
                            </div>
                            <hr/>
                            <div class="row my-5 wow fadeInUp">
                                <div class="col-12">
                                    <h1 class="text-start h4 mb-3">
                                        Fasilitas
                                    </h1>
                                </div>
                                <div class="col-lg-6 py-2">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-dark" style="width: 70px; height: 70px;">
                                            <i class="fa fa-2x fa-wifi text-primary"></i>
                                        </div>

                                        <div class="ms-3 d-flex align-items-center p-0">
                                            <span class="h6 text-secondary">Lorem, ipsum dolor.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 py-2">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-dark" style="width: 70px; height: 70px;">
                                            <i class="fa fa-2x fa-book text-primary"></i>
                                        </div>

                                        <div class="ms-3 d-flex align-items-center p-0">
                                            <span class="h6 text-secondary">Lorem, ipsum dolor.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 py-2">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-dark" style="width: 70px; height: 70px;">
                                            <i class="fa fa-2x fa-plus text-primary"></i>
                                        </div>

                                        <div class="ms-3 d-flex align-items-center p-0">
                                            <span class="h6 text-secondary">Lorem, ipsum dolor.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 py-2">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-dark" style="width: 70px; height: 70px;">
                                            <i class="fa fa-2x fa-wifi text-primary"></i>
                                        </div>

                                        <div class="ms-3 d-flex align-items-center p-0">
                                            <span class="h6 text-secondary">Lorem, ipsum dolor.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row mt-5  wow fadeInUp">
                                <div class="col-12 mb-3">
                                    <h1 class="text-start h4">
                                        Lokasi
                                    </h1>
                                    <a class="d-block text-start" href="#"><i class="fas fa-map-marker-alt"></i> Jalan Lorem ipsum dolor sit amet.</a>
                                </div>
                                <div class="col-12">
                                    <img class="w-100 img-fluid h-75" src="{{ asset('img/carousel-1.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pb-5 wow bounceInDown">
                            {{-- form --}}
                            <form class="shadow border p-3 sticky-top" style="border-radius: 1rem; top: 1rem;">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h5 class="text-start text-primary" style="font-weight: 500">
                                            Pilih Ruangan
                                        </h5>
                                        <h3 class="text-start text-dark">
                                            Rp. 20.000 <span class="h6 text-secondary" style="font-weight: 500">/ 5 Jam</span>
                                        </h3>
                                        <hr/>
                                    </div>
                                    <div class="col-12 my-2">
                                            <label class="text-start d-block mb-2">Tanggal</label>
                                            <input type="date" class="form-select rounded-3 py-3" id="name" placeholder="Your Name">
                                    </div>
                                    <div class="col-6 my-2">
                                        <div class="my-2">
                                            <label class="text-start d-block mb-2">Waktu Mulai</label>
                                            <input type="time" class="form-select rounded-3 py-3" id="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-6 my-2">
                                        <div class="my-2">
                                            <label class="text-start d-block mb-2">Waktu Berakhir</label>
                                            <input type="time" class="form-select rounded-3 py-3" id="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                            <label class="text-start d-block mb-2">Ruangan</label>
                                            <select name="" id="" class="form-select rounded-3 py-3">
                                                <option value="">Test 1</option>
                                                <option value="">Test 2</option>
                                                <option value="">Test 3</option>
                                            </select>
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
                <div class="row g-4">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Room End -->
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
        </script>
 @endsection