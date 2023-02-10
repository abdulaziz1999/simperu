@extends('admin.layout')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Gedung</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Ruangan</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">$ 8541</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Fasilitas</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Kategori Ruangan</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">99%</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Product Sales</h4>
                                    <p>Total Earnings of the Month</p>
                                    <h3 class="m-0">$ 12,555</h3>
                                </div>
                                <div>
                                    <ul>
                                        <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                        <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a></li>
                                        <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="chart_widget_2"></canvas>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="w-100 mr-2">
                                        <h6>Pixel 2</h6>
                                        <div class="progress" style="height: 6px">
                                            <div class="progress-bar bg-danger" style="width: 40%"></div>
                                        </div>
                                    </div>
                                    <div class="ml-2 w-100">
                                        <h6>iPhone X</h6>
                                        <div class="progress" style="height: 6px">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Peminjaman Hari ini</h4>
                        <div id="activity">
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/1.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Received New Order</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>iPhone develered</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>3 Order Pending</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Join new Manager</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Branch open 5 min Late</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>New support ticket received</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/3.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Facebook Post 30 Comments</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Feedback</h4>
                        <div id="activity">
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/1.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Received New Order</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>iPhone develered</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>3 Order Pending</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Join new Manager</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Branch open 5 min Late</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/2.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>New support ticket received</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media pt-3 pb-3">
                                <img width="35" src="{{ asset('images/avatar/3.jpg') }}" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Facebook Post 30 Comments</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-facebook">
                        <span class="s-icon"><i class="fa fa-facebook"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-linkedin">
                        <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-googleplus">
                        <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-twitter">
                        <span class="s-icon"><i class="fa fa-twitter"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection