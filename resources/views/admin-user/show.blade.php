@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0 d-flex align-items-center">
                <div class="col-md-2 mr--5">
                    <a href="{{ route('user.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index')}}" class="text-primary">User</a></li>
                        <li class="breadcrumb-item">Detail User</li>
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
                                        <span class="h3 font-weight-bold text-primary">Detail Data Fasilitas</span>
                                    </div>
                                </div>
                                {{-- keterangan --}}
                                <div class="row">
                                        <div class="col-md-6 ">
                                            <!-- table -->
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-bold">Id</td>
                                                        <td class="font-weight-bold">:</td>
                                                        <td class="font-weight-bold">{{ $user->id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Nama User</td>
                                                        <td class="font-weight-bold">:</td>
                                                        <td class="font-weight-bold">{{ $user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Email</td>
                                                        <td class="font-weight-bold">:</td>
                                                        <td class="font-weight-bold">{{ $user->email}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            
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