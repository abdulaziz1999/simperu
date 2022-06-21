@extends('layouts.layout')
@section('content')
<!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Pesan Segera</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Beragam pilihan ruang tinggal dan menginap</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Pesan Segera</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Temukan Ruangan Nyaman</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Pesan Segera</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Didukung layanan teknologi futuristik.</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Pesan Segera</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Menghadirkan fleksibilitas dan pengalaman baru.</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Booking Start -->
        <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow rounded-3" style="padding: 50px;">
                    <div class="row g-2">
                        <div class="col-12">
<<<<<<< HEAD
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label>Lokasi</label>
                                    <select class="form-select form-select-lg rounded-3" aria-placeholder="Cari Tempat..">
                                        <option selected disabled>Pilih Lokasi</option>
                                        <option value="1">Adult 1</option>
                                        <option value="2">Adult 2</option>
                                        <option value="3">Adult 3</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Kategori</label>
                                    <select class="form-select form-select-lg rounded-3">
                                        <option selected disabled>Pilih Kategori</option>
                                        <option value="1">Child 1</option>
                                        <option value="2">Child 2</option>
                                        <option value="3">Child 3</option>
                                    </select>
=======
                            <form action="{{ url('search') }}" method="post">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label>Gedung</label>
                                        <select name="gedung" class="form-select form-select-lg rounded-3" aria-placeholder="Cari Tempat..">
                                            <option selected disabled>Pilih Lokasi</option>
                                            @if (count($gedung)>0)
                                                @foreach ($gedung as $g)
                                            <option value="{{$g->id}}">{{$g->nama_gedung}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-select form-select-lg rounded-3">
                                            <option selected disabled>Pilih Kategori</option>
                                            @if (count($kategoriRuangan)>0)
                                                @foreach ($kategoriRuangan as $kr)
                                            <option value="{{$kr->id}}">{{$kr->nama_kategori}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
>>>>>>> f77fa4023156a848e7a9488a53f32209f168a13d
                                </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 d-flex justify-content-center">
<<<<<<< HEAD
                            <button class="btn btn-primary font-weight-bold py-3 px-5 rounded-pill"><i class="fa fa-search"></i>  Cari Ruangan</button>
=======
                            <button type="submit" class="btn btn-primary font-weight-bold py-3 px-5 rounded-pill hvr-icon-back"><i class="fa fa-search hvr-icon"></i>  Cari Ruangan</button>
>>>>>>> f77fa4023156a848e7a9488a53f32209f168a13d
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Booking End -->

        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">
                        PENYEWAAN RUANG KERJA SATU-SATUNYA
                    </h6>
                    <h1 class="mb-5"><span class="text-primary">Ruang Kerja</span> Kami</h1>
                </div>

                <div class="row border g-4">
                    {{-- <div class="d-flex justify-content-around"> --}}
                        <div class="col-md-4 wow zoomIn ">
                            <div class="card p-0 shadow border rounded-3">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid rounded-3" src="{{ asset('img/room-1.jpg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center mb-3">
                                        Lorem, ipsum dolor.
                                    </h3>
                                    <p class="text-body text-center">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem delectus amet aut fuga, quisquam suscipit mollitia distinctio reiciendis harum hic?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wow zoomIn ">
                            <div class="card p-0 shadow border rounded-3">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid rounded-3" src="{{ asset('img/room-2.jpg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center mb-3">
                                        Lorem, ipsum dolor.
                                    </h3>
                                    <p class="text-body text-center">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem delectus amet aut fuga, quisquam suscipit mollitia distinctio reiciendis harum hic?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wow zoomIn ">
                            <div class="card p-0 shadow border rounded-3">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid rounded-3" src="{{ asset('img/room-3.jpg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center mb-3">
                                        Lorem, ipsum dolor.
                                    </h3>
                                    <p class="text-body text-center">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem delectus amet aut fuga, quisquam suscipit mollitia distinctio reiciendis harum hic?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wow zoomIn ">
                            <div class="card p-0 shadow border rounded-3">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid rounded-3" src="{{ asset('img/room-3.jpg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center mb-3">
                                        Lorem, ipsum dolor.
                                    </h3>
                                    <p class="text-body text-center">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem delectus amet aut fuga, quisquam suscipit mollitia distinctio reiciendis harum hic?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wow zoomIn ">
                            <div class="card p-0 shadow border rounded-3">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid rounded-3" src="{{ asset('img/room-2.jpg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center mb-3">
                                        Lorem, ipsum dolor.
                                    </h3>
                                    <p class="text-body text-center">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem delectus amet aut fuga, quisquam suscipit mollitia distinctio reiciendis harum hic?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wow zoomIn ">
                            <div class="card p-0 shadow border rounded-3">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid rounded-3" src="{{ asset('img/room-1.jpg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center mb-3">
                                        Lorem, ipsum dolor.
                                    </h3>
                                    <p class="text-body text-center">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem delectus amet aut fuga, quisquam suscipit mollitia distinctio reiciendis harum hic?
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Room End -->


        <!-- Fasilitas Start -->
        <div class="container-xxl testimonial mt-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s" style="margin-bottom: 90px;">
            <div class="container">
                <div class="col-md-12 bg-dark d-flex align-items-center">
                    <div class="p-5 m-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Luxury Living</h6>
                        <h1 class="text-white mb-4">Discover A Brand Luxurious Hotel</h1>
                        <p class="text-white mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Our Rooms</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5">Book A Room</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Fasilitas Start -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-hotel fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Rooms & Appartment</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Food & Restaurant</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-spa fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Spa & Fitness</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-swimmer fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Sports & Gaming</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-glass-cheers fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Event & Party</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-dumbbell fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">GYM & Yoga</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- Testimonial Start -->
        {{-- <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5">
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img/testimonial-1.jpg') }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img/testimonial-2.jpg') }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img/testimonial-3.jpg') }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Testimonial End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="section-title text-center text-primary text-uppercase">Komintas Tim</h6>
                            <h1 class="mb-5">Apa kata mereka tentang <span class="text-primary text-uppercase">Simperu ?</span></h1>
                            <p class="text-body">
                                Kami benci spam! Kami memastikan hanya membagikan informasi terkini tentang Barang Bagus terkait dengan tren di dunia kerja dan komunitas aktivitas sebagai Onyva Member.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <img class="img-fluid w-100" src="{{ asset('img/team-1.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
@endsection
