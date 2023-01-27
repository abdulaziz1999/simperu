@extends('layouts.layout')
@section('content')
            <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ url('public/img/bg-detail.jpg') }});">
            <div class="container-fluid page-header-inner-gedung py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 mb-5 animated slideInDown text-dark">Gedung</h1>
                    <p class="text-secondary px-5">
                        Serangkaian Lingkungan yang dikuratori dengan baik untuk Anda. Menghadirkan lingkungan yang terintegerasi secara nyata dan digital dengan orisinalitas jalanan dan desain tematik. Memberikan Kemudahan untuk Bekerja Lebih Banyak dengan beragam pilihan tempat dan fleksibilitas pembayaran. Temukan pengalaman sewa tempat terbaik hanya di Simperu.
                    </p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Gedung End -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    @if (count($gedung)>0)
                    @foreach ($gedung as $g)
                    <div class="col-md-6 col-lg-4 wow zoomIn hvr-float">
                        <div class="card p-0 shadow border h-100" style="border-radius: 1rem">
                            <a href="{{ route('list-gedung.show', $g->id) }}">
                                <div class="card-header p-0 border-0">
                                    <img class="img-fluid" src="{{ url('storage/app/post-image/'.$g->foto)}}" alt="{{$g->nama_gedung}}" style="border-radius: 1rem">
                                </div>
                                <div class="card-body">
                                    <h4 class="font-weight-bold mb-3">
                                        {{ $g->nama_gedung }}
                                    </h4>
                                    <p class="text-body">
                                        {{ $g->alamat }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="col-md-6 col-lg-4 wow zoomIn hvr-float">
                        {{$gedung->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Gedung End -->
@endsection