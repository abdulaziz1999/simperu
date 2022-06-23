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
                        <li class="breadcrumb-item">Daftar Ruangan</li>
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
                                        <div class="d-flex justify-content-between flex-row-reverse align-content-center">
                                            <span class="h3 font-weight-bold">Daftar Ruangan </span>
                                            <a href="{{route('ruangan.create')}}" class="btn btn-success font-weight-bold text-white"><i class="fa fa-plus"></i> Tambah Data</a>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Ruangan</th>
                                                <th>Kategori Ruangan</th>
                                                <th>Gedung</th>
                                                <th>Kapasitas</th>
                                                <th>Status</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ruangan as $r)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $r->nama_ruangan }}</td>
                                                <td>{{ $r->kategoriRuangan->nama_kategori}}</td>
                                                <td>{{ $r->gedung->nama_gedung}}</td>
                                                <td>{{ $r->kapasitas }}</td>
                                                <td>{{ $r->status }}</td>
                                                <td>{{ $r->harga }}</td>
                                                <td>
                                                <form class="d-flex justify-content-center align-items-center" action="{{ route('ruangan.destroy',$r->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info text-white font-weight-bold mx-1 my-1" href="{{ route('ruangan.show',$r->id) }}"><i class="fa fa-eye"></i> Detail</a>
                                                    <a class="btn btn-sm btn-warning text-white font-weight-bold mx-1 my-1" href="{{ route('ruangan.edit',$r->id) }}"><i class="fa fa-pencil"></i> Ubah</a>
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