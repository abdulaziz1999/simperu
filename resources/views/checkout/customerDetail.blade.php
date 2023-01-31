 @extends('layouts.layout')
 @section('content')
<div class="container-fluid page-header p-0">
    <div class="container-fluid page-header-inner-gedung py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-end">
                    <div class="w-75">
                        {{-- button back and table available room --}}
                        <div class="col-12 text-start mx-0 px-0 mb-3">
                            {{-- <a class="fs-3 d-inline" href="{{url('/list-ruangan/detail/'.$ruangan->id.'-'.$ruangan->nama_ruangan)}}"><i class="fas fa-arrow-left"></i></a> --}}
                        </div>
                        <div class="col-12 text-start mb-5">
                            <div class="w-fit-contet">
                                <span class="h3 d-block">Tinjau Pemesanan Anda</span>
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-start mb-5">
                            <h5 class="text-primary mb-3">{{$request->session()->get('ruangan')->kategoriRuangan->nama_kategori}}</h5>
                            <h2>{{ $request->session()->get('harga_ruangan') }} <span class="text-secondary h5" style="font-weight: 500">/ Jam</span></h2>
                        </div>
                        <div class="col-12 mt-3 text-start">
                            <h5 class="text-dark mb-3">Informasi Peminjam</h5>
                        </div>
                        <div class="col-12">
                            <form  method="post" action="{{ route('checkout.store') }}" class="text-start">
                                @csrf
                                <div class="mb-3">
                                    <label class="text-start mx-0 px-0">Nama Peminjam</label>
                                    <input required type="text" name="nama" class="form-control rounded-3" value="{{Auth::user()->name}}"/>
                                </div>
                                <div class="mb-3">
                                    <label class="text-start mx-0 px-0">Email Peminjam</label>
                                    <input required type="email" name="email" class="form-control rounded-3" value="{{Auth::user()->email}}"/>
                                </div>
                                <div class="mb-3">
                                    <label class="text-start mx-0 px-0">Nomer Telefon Peminjam</label>
                                    <input required type="tel" name="nomer_tel" class="form-control rounded-3" placeholder="Masukan Nomer Anda..."/>
                                </div>
                                <div>
                                    <span class="text-danger mb-3">*Pada proses check-in, wajib menunjukan KTP yang sesuai dengan data diatas</span>
                                </div>
                                <div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary rounded-3 hvr-icon-forward">Selanjutnya <i class="fas fa-arrow-right hvr-icon"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-start align-items-center">
                    <div class="card w-75 shadow bg-body" style="border-radius: 1rem">
                        <div class="card-header p-0" style="border-radius: 1rem">
                            <img class="img-fluid w-100" src="{{ url('storage/app/post-image/'.$request->session()->get('ruangan')->foto1) }}" alt="{{$request->session()->get('ruangan')->foto1}}" style="border-radius: 1rem">
                        </div>
                        <div class="card-body">
                            <div class="text-start py-2">
                                <span class="d-block font-weight-bold text-primary">{{$request->session()->get('ruangan')->gedung->nama_gedung}}</span>
                                <h3 class="text-dark">{{$request->session()->get('ruangan')->nama_ruangan}}</h3>
                            </div>
                            <span class="d-block" style="border-bottom: 2px dashed rgba(0, 0, 0, .2)"/></span>
                            <div class="text-start py-2 my-2">
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <i class="text-primary fas fa-users"></i>
                                    </div>
                                    <div class="col-11">
                                        <span class="d-block font-weight-bold text-secondary">{{$request->session()->get('ruangan')->kapasitas}} Orang</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <i class="text-primary fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="col-4">
                                        <span class="text-secondary">{{$request->session()->get('waktu_peminjaman')['tgl_pinjam']}}</span><br/>
                                        <span>{{$request->session()->get('waktu_peminjaman')['jam_mulai']}}</span>
                                    </div>
                                    <div class="col-2">
                                        <i class="text-primary fas fa-arrow-right"></i>
                                    </div>
                                    <div class="col-4">
                                        <span class="text-secondary">{{$request->session()->get('waktu_peminjaman')['tgl_selesai']}}</span><br/>
                                        <span>{{$request->session()->get('waktu_peminjaman')['jam_selesai']}}</span>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block" style="border-bottom: 2px dashed rgba(0, 0, 0, .2)"/></span>
                            <div class="text-start py-2 my-2">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <span>{{ $request->session()->get('harga_ruangan') }} <i class="text-secondary fas fa-times"></i> {{  $request->session()->get('durasi') }} Jam</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="d-block font-weight-bold text-secondary"> {{ $request->session()->get('total_harga_ruangan') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-start py-2 my-2">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <span class="h6">Total</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="h6">{{$request->session()->get('total_harga_ruangan')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
 @endsection