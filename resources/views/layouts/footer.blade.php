        <div class="container-fluid bg-dark text-light footer wow fadeIn mt-1" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-2">
                            <a href="{{ url('/')}}"><img class="img-fluid w-50" src="{{asset('img/logo_footer.svg')}}" alt="logo_navbar"></a>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Kontak Kami</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jalan Lenteng Agung Raya No.20 RT.5/RW.1 Lenteng Agung, Kelurahan, RT.4/RW.1, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 8998077524</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>sp@simperu.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Properti</h6>
                                <a class="btn btn-link" href="{{url('/list-gedung')}}">Gedung</a>
                                <a class="btn btn-link" href="{{url('/list-ruangan')}}">Ruangan</a>
                                <a class="btn btn-link" href="{{url('/tentang-kami')}}">Tentang Kami</a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Bantuan</h6>
                                <a class="btn btn-link" href="{{url('/kontak-kami')}}">Kontak Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-12 text-center ">© Simperu Properties. {{date('Y')}}. Tim One - MSIB Batch 2</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fas fa-arrow-up"></i></a>