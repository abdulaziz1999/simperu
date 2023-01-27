<!-- Header Start -->
        <div class="container-fluid bg-dark">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="{{ url('/') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <img class="img-fluid w-50" src="{{url('public/img/logo_navbar.svg')}}" alt="logo_navbar">
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                            <img class="img-fluid w-50" src="{{url('public/img/logo_navbar.svg')}}" alt="logo_navbar">
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="{{ url('/')}}" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">Beranda</a>
                                <a href="{{ route('list-gedung.index')}}" class="nav-item nav-link {{ (request()->is('list-gedung') || request()->is('list-gedung/*')) ? 'active' : '' }}">Gedung</a>
                                <a href="{{ route('list-ruangan.showAllRoom') }}" class="nav-item nav-link {{ (request()->is('list-ruangan') || request()->is('list-ruangan/*')) ? 'active' : '' }}">Ruangan</a>
                                @if(Auth::check())
                                <a href="{{ route('peminjamanku.index') }}" class="nav-item nav-link {{ (request()->is('peminjamanku') || request()->is('peminjamanku/*')) ? 'active' : '' }}">PeminjamanKu</a>
                                @endif
                                @if(Auth::check())
                                <div class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle {{ (request()->is('tentang-kami') || request()->is('kontak-kami')) ? 'active' : '' }}" data-bs-toggle="dropdown">Lainnya</a>
                                    <ul class="dropdown-menu rounded-0 m-0 pe-0" aria-labelledby="dropdownMenuButton1">
                                        <li class="fw-bold px-3" disabled aria-readonly="true">Properti</li>
                                        <li ><a class="dropdown-item {{ (request()->is('tentang-kami')) ? 'active' : '' }}" href="{{url('/tentang-kami')}}">Tentang Kami</a></li>
                                        <li class="fw-bold px-3" disabled aria-readonly="true">Bantuan</li>
                                        <li><a class="dropdown-item {{ (request()->is('kontak-kami')) ? 'active' : '' }}" href="{{url('/kontak-kami')}}">Kontak Kami</a></li>
                                    </ul>
                                </div>
                                @else
                                <a class="nav-item nav-link {{ (request()->is('tentang-kami')) ? 'active' : '' }}" href="{{url('/tentang-kami')}}">Tentang Kami</a>
                                <a class="nav-item nav-link {{ (request()->is('kontak-kami')) ? 'active' : '' }}" href="{{url('/kontak-kami')}}">Kontak Kami</a></li>
                                @endif
                            </div>
                            <div class="me-0 me-lg-5">
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
                                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user text-primary me-md-2 me-0"></i>{{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu rounded-0 m-0 pe-0" style="min-width: 9rem">
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