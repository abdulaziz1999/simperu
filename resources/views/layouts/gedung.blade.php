@extends('layouts.layout')
@section('content')
            <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('img/carousel-1.jpg') }});">
            <div class="container-fluid page-header-inner-gedung py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 mb-5 animated slideInDown text-dark">Gedung</h1>
                    <p class="text-secondary px-5">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate atque molestias quod repudiandae asperiores inventore aspernatur, ducimus eos quas aperiam odit! Vitae consequuntur, ea ratione, deleniti dignissimos eaque officia illo vero nemo officiis incidunt? In provident eveniet, optio labore veritatis nobis pariatur laborum cumque. Magnam ipsam dolor ab ad suscipit, sunt quasi minus aspernatur quam dolore, odit aut, non mollitia. Quos laboriosam vel voluptas qui minima adipisci, laborum assumenda vero sapiente facilis nobis excepturi distinctio aliquam quas necessitatibus, dignissimos ipsum esse laudantium fugit asperiores architecto quisquam. Officia rerum reprehenderit labore possimus quidem placeat explicabo totam, unde laborum nulla earum nostrum!
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
                                    <img class="img-fluid" src="{{ asset('storage/post-image/'.$g->foto)}}" alt="{{$g->nama_gedung}}" style="border-radius: 1rem">
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
                </div>
            </div>
        </div>
        <!-- ./Gedung End -->

@endsection