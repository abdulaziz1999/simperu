 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
        <div class="container-fluid page-header p-0">
            <div class="container-fluid page-header-inner-gedung">
                <div class="container text-center">
                    <div class="row">
                        
                    </div>
                    <div class="row bg-dark m-md-3 my-3 p-2" style="border-radius: 1rem; border: .2rem dashed white">
                        <div class="col-12 my-5">
                            <h5 class="text-primary">
                                Harap transfer ke rekening dibawah ini
                            </h5>
                        </div>
                        <div class="col-md-6 p-2 mb-5">
                            <h4 class="text-primary my-3">
                                Bank Central Asia
                            </h4>
                            <img src="{{ asset('img/bca.svg')}}" class="img-fluid px-2 mb-5" alt="bca-bank-logo" style="max-width: 250px; width: 100%;">
                            <h4 class="text-primary">
                                Nomer Rekening <br> <span class="h1 my-1 d-block text-white">5410425787</span>
                            </h4>
                            <h4 class="text-primary">
                                A/n <br> <span class="h1 my-1 d-block text-white">PT. SIMPERU</span>
                            </h4>
                        </div>
                        <div class="col-md-6 p-2 my-5 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="text-primary mb-3">
                                Berlaku dari :<br/>
                                <span>{{$waktu_peminjaman->tgl_pinjam}}</span>
                            </h5>
                            <h5 class="text-primary mb-3">
                                Samapai dengan :<br/>
                                <span>{{$waktu_peminjaman->tgl_selesai}}</span>
                            </h5>
                            <a class="btn btn-md btn-primary rounded-3" href="{{url('')}}">
                                Konfirmasi Pembayaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
 @endsection