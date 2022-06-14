<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    {{-- <li class="nav-label font-weight-bold">Role : Admin</li> --}}
                    <li>
                        <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-tachometer" aria-hidden="true"></i> <span class="nav-text">Master Data</span>
                        </a>
                        <ul aria-expanded="true">
                            <li class="active"><a href="{{route('gedung.index')}}" ><i class="fa fa-table" aria-hidden="true"></i> Daftar Gedung</a></li>
                            <li class=""><a href="#"><i class="fa fa-table" aria-hidden="true"></i> Daftar Ruangan</a></li>
                            <li class=""><a href="{{ route('fasilitas.index') }}"><i class="fa fa-table" aria-hidden="true"></i> Daftar Fasilitas</a></li>
                            <li><a href="{{ route('kategoriRuangan.index')}}"><i class="fa fa-table" aria-hidden="true"></i> Kategori Ruangan </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-exchange" aria-hidden="true"></i> <span class="nav-text">Transaksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-book" aria-hidden="true"></i> <span class="nav-text">Laporan Monitor</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-gear" aria-hidden="true"></i> <span class="nav-text">Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->