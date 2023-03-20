<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo bg-info">
                <a href="{{ url('/admin')}}">
                    <b class="logo-abbr"><img src="{{ asset('img/logo_navbar.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('images/logo-compact.png') }}" alt=""></span>
                    <span class="brand-title">
                        <img class="w-75" src="{{ asset('img/logo_navbar.png') }}">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
<!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1">
                        </div>
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <!-- Menu Website icon globe -->
                        <li class="icons d-none d-md-flex">
                            <a href="{{ url('/') }}" class="log-user">
                                <span class="font-weight-bold">
                                    <i class="fa fa-globe text-primary mt-3" style="font-size: 2.5rem;"></i>
                                </span>
                            </a>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline fa-shake"></i>
                                    @php
                                        $today = date('Y-m-d');
                                        $count = DB::table('peminjaman')->whereDate('created_at', $today);
                                    @endphp
                                <span class="badge badge-pill gradient-2">{{$count->count()}}</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    @if($count->count() == 0)
                                    <span class="">Tidak ada peminjaman hari ini</span>
                                    @else
                                    <span class="">{{$count->count()}} New Notifications</span> 
                                    @endif 
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">{{$count->count()}}</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        @if($count->count()> 0)
                                        @foreach($count->get() as $data)
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="fa fa-bell"></i></span>
                                                <div class="notification-content">
                                                    @php
                                                        $ruangan = DB::table('ruangan')->where('id', $data->ruangan_id)->first();
                                                    @endphp
                                                    <h6 class="notification-heading">{{$ruangan->nama_ruangan}}</h6>
                                                    <span class="notification-text"></span>  <p> <strong class="text-warning">{{$data->status_peminjaman}}</strong> | ({{date('d-m-Y',strtotime($data->created_at))}})</p>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span class="font-weight-bold">
                                @if(empty(Auth::user()->name))
                                {{''}}
                                @else
                                {{ Auth::user()->name }}
                                @endif
                                </span>
                            </a>
                        </li>
                        {{-- ./nama user --}}
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{ asset('images/user/1.png') }}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{url('profile')}}"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <!-- <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li> -->
                                        <hr class="my-2">
                                        <!-- <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>  -->
                                        <li>
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> <span>Logout</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <input type="hidden" id="base_url" value="{{ url('') }}">
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->