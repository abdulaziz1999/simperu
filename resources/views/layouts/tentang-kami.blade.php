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
<div class="page-header mb-5 p-0" style="background-image: url({{ asset('img/tentang-kami.jpg') }});">
    <div class="container-fluid page-header-inner-gedung py-5">
        <div class="container text-center pb-5">
            <div class="row d-flex justify-content-start justify-content-lg-end align-items-center">
                <div class="col-lg-4 text-start wow fadeIn animated slideInUp" data-wow-delay="0.{{++$data['i']}}s">
                    <h1 class="display-5 text-dark mb-3">Tentang Kami</h1>
                    <h4 class="text-primary mb-3">Mengubah Lingkungan</h4>
                    <span class="text-secondary">Platform teknologi yang mengintegrasikan sistem manajemen properti ujung ke ujung dan aplikasi pengalaman penyewa untuk Real Estat Komersial</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ./Page Header --}}
{{-- visi-misi --}}
<div class="page-header p-0">
    <div class="container-fluid page-header-inner-gedung">
        <div class="container text-center pb-5">
            <div class="row d-flex justify-content-start justify-content-lg-end align-items-center">
                @php $data['i'] = 0 @endphp
                <div class="col-lg-3 text-center wow fadeIn animated slideInUp" data-wow-delay="0.{{++$data['i']}}s">
                    <h1 class="display-5 text-dark mb-3 animated slideInDown">Visi kami</h1>
                    <span class="text-secondary mb-3 animated slideInDown">Untuk menciptakan Lingkungan Impian dan Layak Huni di mana-mana</span>
                </div>
                <div class="col-lg-6 text-center wow fadeIn animated slideInUp" data-wow-delay="0.{{++$data['i']}}s">
                    <img class="img-fluid" src="{{ asset('img/visi-misi.png')}}" alt="visi-misi">
                </div>
                <div class="col-lg-3 text-center wow fadeIn animated slideInUp" data-wow-delay="0.{{++$data['i']}}s">
                    <h1 class="display-5 text-dark mb-3 animated slideInDown">Misi Kami</h1>
                    <span class="text-secondary mb-3 animated slideInDown">Menghadirkan Liveable Neighborhood yang menjadi tempat tinggal idaman bagi kaum Millenials.
Melalui framework 15min Neighborhood ini, Simperu juga memiliki misi untuk mengajak kaum Millenials dalam gerakan kepedulian akan lingkungan yang berkelanjutan dengan berperan aktif dalam mengurangi emisi karbon.</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- visi-misi --}}
<!-- <div class="page-header my-3 py-5 bg-dark">
    <div class="container-fluid">
        <div class="container text-center pb-5">
            <div class="row d-flex justify-content-start justify-content-lg-end align-items-center">
                <div class="mb-3 col-12 text-center">
                    <h1 class="display-5 text-primary mb-3 animated slideInDown wow fadeIn" data-wow-delay="0.{{++$data['i']}}">Inspirasi Kami</h1>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="row d-flex justify-content-center">
                        @php $data['i'] = 0 @endphp
                        @if(count($data['inspirasi'])>0)
                        @foreach ($data['inspirasi'] as $value)
                        <div class="col-md-6 col-lg-4 col-sm-8 d-flex justify-content-center animated slideInUp wow fadeIn" data-wow-delay="0.{{++$data['i']}}s">
                            <div class="card w-75 bg-dark" style="border-radius: .8rem; border: none;">
                                <div class="card-header p-0 bg-dark" style="border-radius: .8rem;">
                                    <img class="img-fluid w-100" src="{{ asset($value['image'])}}" alt="{{$value['image']}}" style="border-radius: .8rem;">
                                </div>
                                <div class="card-body bg-dark text-white">
                                    <h4 class="mb-3 text-primary">{{$value['head']}}</h4>
                                    <p>{{$value['title']}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
{{-- ./visi-misi --}}

{{-- our-team --}}
<!-- <div class="page-header my-3 py-5">
    <div class="container-fluid page-header-inner-gedung">
        <div class="container text-center pb-5">
            <div class="row d-flex justify-content-start justify-content-lg-end align-items-center">
                <div class="mb-3 col-12 text-center">
                    <h1 class="display-5 text-dark mb-3 wow fadeIn animated slideInDown" data-wow-delay="0.{{++$data['i']}}">Tim Kami</h1>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="row d-flex justify-content-center">
                        @php $data['i'] = 0 @endphp
                        @if(count($data['tim'])>0)
                        @foreach ($data['tim'] as $value)
                        <div class="col-md-6 col-lg-4 d-flex justify-content-center animated wow fadeIn slideInUp" data-wow-delay="0.{{++$data['i']}}s">
                            <div class="card w-75 d-flex justify-content-center align-items-center" style="border: none;">
                                <div class="card-header p-0" style="border-radius: 50%; max-width: 150px; width: 100%;">
                                    <img src="{{$value['link-profile-ig']}}" class="img-fluid w-100 rounded-pill" alt="foto-{{$value['nama']}}" style="border-radius: .8rem;">
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-1">{{$value['nama']}}</h6>
                                    <p>{{$value['jobdesk']}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
{{-- ./our-team --}}
@endsection