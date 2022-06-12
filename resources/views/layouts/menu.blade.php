<!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="{{ url('/') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                                <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                                <a href="{{ url('/service') }}" class="nav-item nav-link">Services</a>
                                <a href="{{ url('/room') }}" class="nav-item nav-link">Rooms</a>
                                <div class="nav-item dropdown">
                                    <a href="{{ url('/pages') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{ url('/booking') }}" class="dropdown-item">Booking</a>
                                        <a href="{{ url('/team') }}" class="dropdown-item">Our Team</a>
                                        <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a>
                                    </div>
                                </div>
                                <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                            </div>
                            <a href="{{ url('/admin') }}" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->