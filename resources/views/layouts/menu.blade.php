<!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="{{ url('/') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Simperu</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Simperu</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <div class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">All Pages Gedung</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{ route('mansion.index') }}" class="dropdown-item">Alur Pemilihan Ruangan 1</a>
                                        <a href="{{ url('/alur-pemilihan-ruangan-1') }}" class="dropdown-item">Alur Pemilihan Ruangan 2</a>
                                        <a href="{{ url('/alur-pemilihan-ruangan-2') }}" class="dropdown-item">Alur Pemilihan Ruangan 3</a>
                                        {{-- <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a> --}}
                                    </div>
                                </div>
                                <div class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">All Pages Checkout</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{ url('/alur-checkout-1') }}" class="dropdown-item">Alur Checkout 1</a>
                                    </div>
                                </div>
                                <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                            </div>
                            <div class="me-3 me-lg-5">
                                <a href="{{ url('/admin') }}" class="btn btn-outline-primary rounded-3 me-lg-2 me-5 py-lg-2 px-lg-2">Sign-up</a>
                                <a href="{{ url('/admin') }}" class="btn btn-primary rounded-3 py-lg-2 px-lg-2">Login</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->