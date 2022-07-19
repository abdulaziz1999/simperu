@extends('layouts.layout')
@section('content')
{{-- Spinner --}}
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
{{-- ./Spinner --}}
{{-- Page Header --}}
<div class="page-header my-5 p-y">
    <div class="container-fluid">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 d-flex align-items-center flex-column wow fadeIn animated slideInUp" data-wow-delay="0.{{++$data['i']}}s">
                    <h1 class="display-5 text-dark mb-3 animated slideInDown">Kontak Kami</h1>
                    <span class="text-secondary mb-3 animated slideInDown">Silahkan mengisi kelengkapan data di bawah ini dan menjelaskan keluhan, saran atau bantuan lain yang dibutuhkan.</span>
                    <a class="btn btn-primary rounded-pill hvr-icon-back" href="https://wa.me/08998077524/" target="_blank">
                        <i class="fas fa-phone-alt me-3 hvr-icon"></i>
                        Telepon Kami
                    </a>
                    <img class="img-fluid" src="{{ asset('img/cs-kontak-kami.png') }}" alt="cs-kontak-kami.png">
                </div>
                <div class="col-lg-8 text-start wow fadeIn animated slideInUp" data-wow-delay="0.{{++$data['i']}}s">
                    <form action="{{ url('/kontak-kami')}}" method="get" class="border p-5" style="border-radius: .5rem;">
                        <div class="row mb-3">
                            <label class="col-form-label">Nama <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input class="form-control-lg form-control w-100" type="text" name="nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input class="form-control-lg form-control w-100" type="email" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label">Nomer Telefon <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    +62
                                </span>
                                <input type="tel" class="form-control-lg form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label">Tipe <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <select class="form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option disabled selected>Pilih Tipe</option>
                                    @if(count($data) > 0)
                                    @foreach ($data['form-select-tipe'] as $value)
                                    <option class="text-capitalize" value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label">Permintaan Tambahan</label>
                            <div class="col-12">
                                <textarea class="form-control" name="permintaan_tambahan" style="max-height: 200px;height: 100vh;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn rounded-pill btn-primary w-100 text-capitalize hvr-icon-back">
                                    <i class="far fa-paper-plane me-2 hvr-icon"></i>
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ./Page Header --}}
@endsection