<!-- Header Start -->
        <div class="container-fluid bg-dark">
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
                                <a href="{{ route('list-gedung.index')}}" class="nav-item nav-link">Daftar Gedung</a>
                                <a href="{{ route('list-ruangan.showAllRoom') }}" class="nav-item nav-link">Daftar Ruangan</a>
                                <a href="{{ route('peminjamanku.index') }}" class="nav-item nav-link">PeminjamanKu</a>
                                <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                            </div>
                            <div class="me-3 me-lg-5">
                                @guest
                                    <div class="btn-group">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-outline-primary rounded-3 me-lg-2 me-5 py-lg-2 px-lg-2">Sign-up</a>
                                        @endif
                                        @if (Route::has('login'))
                                            <a href="{{ route('login') }}" class="btn btn-primary rounded-3 py-lg-2 px-lg-2"><i class="fa fa-sign-in"></i> Login</a>
                                        @endif
                                    </div>
                                @else
                                <div class="btn-group">
                                    <div class="nav-item dropdown">
                                        <a href="javascript:void(0)" class="nav-link position-relative" data-bs-toggle="dropdown">
                                            <i class="fas fa-bell position-relative">
                                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                                </span>
                                            </i> 
                                        </a>
                                        <div class="dropdown-menu rounded-0 m-0">
                                            <a class="dropdown-item">
                                                <span class="h5 fw-bold">
                                                    Konfirmasi Pembayaran
                                                </span>
                                                <br>
                                                <span>
                                                    Lorem ipsum dolor sit amet...
                                                </span>
                                            </a>
                                            <a class="dropdown-item">Notif 1</a>
                                            <a class="dropdown-item">Notif 1</a>
                                            <a class="dropdown-item">Notif 1</a>
                                        </div>
                                    </div>
                                    <div class="nav-item dropdown">
                                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu rounded-0 m-0">
                                            <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->