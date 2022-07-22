@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col-md-2">
                    <a href="{{ route('user.index') }}" class="btn" style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="col-md-10 p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index')}}" class="text-primary">Daftar Kategori Ruangan</a></li>
                        <li class="breadcrumb-item">Edit User</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <form  action="{{ route('user.update',$user->id) }}" method="post" autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex justify-content-between">
                                                <span class="h3 font-weight-bold text-primary">Edit Data User</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-kode">Nama User<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="tel" class="form-control input-default" id="val-kode" name="name" placeholder="Nama Kategori" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-email">Email<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="email" class="form-control input-default" id="val-email" name="email" placeholder="Email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-password">Password<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <input type="password" class="form-control input-default" id="val-password" name="password" placeholder="Password" value="{{$user->password}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-role">Role<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-10">
                                                <select class="form-control" id="val-role" name="role">
                                                    <option value="">Pilih Role</option>
                                                    <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                                                    <option value="peminjam" {{$user->role == 'peminjam' ? 'selected' : ''}}>Peminjam</option>
                                                </select>
                                            </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                {{-- spasi --}}
                                            </div>
                                            <div class="col-lg-10 d-flex justify-content-center justify-content-lg-start">
                                                <button type="submit" class="btn btn-md btn-primary text-white font-weight-bold">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
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