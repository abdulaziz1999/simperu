@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0 d-flex align-items-center">
                <div class="col-md-2">
                    <a href="{{ route('feedback.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('feedback.index')}}" class="text-primary">Daftar Feedback</a></li>
                        <li class="breadcrumb-item">Detail Data Feedback</li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- heading --}}
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <span class="h3 font-weight-bold text-primary">Detail Feedback</span>
                                    </div>
                                </div>
                                {{-- keterangan --}}
                                <div class="row mb-5 d-flex align-items-md-center">
                                    <div class="col-12">
                                        <div class="row mb-6">
                                            <div class="col-md-2">
                                                <span class="h4 font-weight-light text-black-50">Keterangan :</span>
                                            </div>
                                            <div class="col-md-10">
                                                <span class="h4 font-weight-bold">{{ $feedback->keterangan_feedback }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <div class="col-md-2">
                                                <span class="h4 font-weight-light text-black-50">Poin :</span>
                                            </div>
                                            <div class="col-md-10">
                                                <span class="h4 font-weight-bold">{{ $feedback->poin }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #/ container -->
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->    
@endsection