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
                        <li class="breadcrumb-item">Daftar Kategori Ruangan</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <div class="d-flex justify-content-between">
                                            <span class="h3 font-weight-bold">Daftar Kategori Ruangan </span>
                                            <a href="{{route('kategoriRuangan.create')}}" class="btn btn-success font-weight-bold text-white"><i class="fa fa-plus"></i> Tambah Data</a>
                                        </div>

                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success m-2">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif

                                        <thead>
                                            <tr>
                                                <th>Nama kategori Ruangan</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kategoriRuangan as $k):
                                            <tr>
                                                <td>{{ $k->nama_kategori }}</td>
                                                <td>{{ $k->keterangan }}</td>
                                                <td>
                                                <form action="{{ route('kategoriRuangan.destroy',$k->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info" href="{{ route('kategoriRuangan.show',$k->id) }}"><i class="fa fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('kategoriRuangan.edit',$k->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
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