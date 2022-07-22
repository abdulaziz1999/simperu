<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="font-weight-bold" href="{{ url('/admin') }}" aria-expanded="false">
                            <i class="fa fa-home" aria-hidden="true"></i> <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow font-weight-bold" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-tachometer" aria-hidden="true"></i> <span class="nav-text">Master Data</span>
                        </a>
                        <ul aria-expanded="true">
                            <li><a class="font-weight-bold" href="{{route('gedung.index')}}" ><i class="fa fa-table" aria-hidden="true"></i> Data Gedung</a></li>
                            <li><a class="font-weight-bold" href="{{ route('ruangan.index') }}"><i class="fa fa-table" aria-hidden="true"></i> Data Ruangan</a></li>
                            <li><a class="font-weight-bold" href="{{ route('fasilitas.index') }}"><i class="fa fa-table" aria-hidden="true"></i> Data Fasilitas</a></li>
                            <li><a class="font-weight-bold" href="{{ route('kategoriRuangan.index')}}"><i class="fa fa-table" aria-hidden="true"></i> Data Kategori Ruangan </a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="font-weight-bold" href="{{ route('peminjaman.index') }}" aria-expanded="false">
                            <i class="fa fa-exchange" aria-hidden="true"></i> <span class="nav-text">Peminjaman</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="font-weight-bold" href="{{ route('laporan.index') }}" aria-expanded="false">
                            <i class="fa fa-book" aria-hidden="true"></i> <span class="nav-text">Laporan</span>
                        </a>
                    </li> -->
                    <li>
                        <a class="font-weight-bold" href="{{ route('feedback.index') }}" aria-expanded="false">
                            <i class="fa fa-exchange" aria-hidden="true"></i> <span class="nav-text">Feedback</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow font-weight-bold" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-gear" aria-hidden="true"></i> <span class="nav-text">Pengaturan</span>
                        </a>
                        <ul aria-expanded="true">
                            <li class=""><a href="{{route('user.index')}}" ><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
                            <!-- <li class=""><a href="{{ url('profile') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->