@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Master Data</a></li>
                        <li class="breadcrumb-item">Daftar Fasilitas</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success m-2">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <div class="d-flex justify-content-between align-content-center">
                                            <span class="h3 font-weight-bold text-primary">Daftar Fasilitas </span>
                                            <a href="{{route('fasilitas.create')}}" class="btn btn-success font-weight-bold text-white"><i class="fa fa-plus"></i> Tambah Data</a>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Fasilitas</th>
                                                <th>Ruangan</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fasilitas as $fas)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $fas->nama_fasilitas }}</td>
                                                <td>{{ $fas->ruangan->nama_ruangan }}</td>
                                                <td class="d-flex justify-content-center"><img class="border p-2 shadow" style="min-width: 70px;width: 100%; max-height: 100px" src="{{ asset('storage/post-image/'.$fas->foto) }}" alt="{{ $fas->nama_failitas }}"></td>
                                                    <td>
                                                    <form class="d-flex justify-content-center align-items-center" action="{{ route('fasilitas.destroy',$fas->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-info text-white font-weight-bold mx-1 my-1" href="{{ route('fasilitas.show',$fas->id) }}"><i class="fa fa-eye"></i> Detail</a>
                                                        <a class="btn btn-sm btn-warning text-white font-weight-bold mx-1 my-1" href="{{ route('fasilitas.edit',$fas->id) }}"><i class="fa fa-pencil"></i> Ubah</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" class="btn btn-sm btn-danger text-white font-weight-bold mx-1 my-1"><i class="fa fa-trash"></i> Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection