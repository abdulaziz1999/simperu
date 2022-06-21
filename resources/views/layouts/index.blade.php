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
                                </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary font-weight-bold py-3 px-5 rounded-pill hvr-icon-back"><i class="fa fa-search hvr-icon"></i>  Cari Ruangan</button>
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
                        CARI RUANGAN SESUAI KEBUTUHANMU
                    </h6>
                    <h1 class="mb-5"><span class="text-primary">Ruangan</span> Kami</h1>
                </div>

                <div class="row g-4">
                    @if (count($kategoriRuangan)>0)
                        @foreach ($kategoriRuangan as $kr)
                        <div class="col-md-6 col-lg-4 wow zoomIn hvr-float">
                            <div class="card p-0 shadow border h-100" style="border-radius: 1rem;">
                                <div class="card-header p-0 border-0 mx-0" style="border-radius: 1rem;">
                                    <img class="img-fluid w-100" src="{{ asset('img/fasilitas_'.++$i.'.jpg')}}" alt=""style="border-radius: 1rem 1rem 2rem 2rem;">
                                </div>
                                <div class="card-body">
                                    <h3 class="font-weight-bold text-center mb-3">
                                        {{$kr->nama_kategori}}
                                    </h3>
                                    <p class="text-body text-center">
                                        {{ $kr->keterangan }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div
        

        <!-- Testimonial Start -->
        <div class="container-xxl testimonial mt-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s" style="margin-bottom: 90px;">
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
        </div>
        <!-- Testimonial End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Fasilitas yang kami tawarkan</h6>
                    <h1 class="mb-5"><span class="text-primary">Fasilitas</span> Kami</h1>
                </div>
                <div class="row g-4">
                    @if (count($fasilitasGroup)> 0 )
                        @foreach ($fasilitasGroup as $f)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a class="service-item bg-dark hvr-float shadow w-100 h-100" href="" style="border-radius: 1rem">
                                <div class="service-icon bg-transparent p-1">
                                    <div class="rounded d-flex align-items-center justify-content-center">
                                        <i class="fa fa-wifi fa-2x text-primary"></i>
                                    </div>
                                </div>
                                <h5 class="text-white mb-3">{{$f->nama_fasilitas}}</h5>
                                <p class="text-white mb-0">{{$f->keterangan}}</p>
                            </a>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- Service End -->
        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-0 mb-0">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="section-title text-center text-primary text-uppercase">Mengapa memilh kami</h6>
                            <h1 class="mb-5">Keunggulan <span class="text-primary text-uppercase">Simperu</span></h1>
                            <ul class="spesial-list">
                                <li>
                                    Kehidupan yang terinspirasi hotel
                                </li>
                                <li>
                                    Fasilitas dan layanan terintegrasi
                                </li>
                                <li>
                                    Kontrak dan pembayaran yang fleksibel
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <img class="img-fluid w-100" src="{{ asset('img/team-1.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
@endsection
