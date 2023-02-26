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
                                    <table class="table table-striped zero-configuration">
                                        <div class="d-flex justify-content-between align-content-center">
                                            <span class="h3 font-weight-bold text-info">Daftar Kategori Ruangan </span>
                                            <div class="btn-group">
                                                <a href="{{route('kategoriRuangan.create')}}" class="btn btn-sm btn-info font-weight-bold text-white mr-1 my-1"><i class="fa fa-plus"></i> Tambah Data</a>
                                                <a href="{{url('kategoriRuanganpdf')}}" class="btn btn-sm btn-danger font-weight-bold text-white mr-1 my-1"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                                <a href="{{url('kategoriRuanganexcel')}}" class="btn btn-sm btn-success font-weight-bold text-white mr-1 my-1"><i class="fa fa-file-excel-o"></i> Excel</a>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>Nama kategori Ruangan</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kategoriRuangan as $k)
                                            <tr>
                                                <td>{{ $k->nama_kategori }}</td>
                                                <td>{{ $k->keterangan }}</td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                <form action="{{ route('kategoriRuangan.destroy',$k->id) }}" method="POST">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-info text-white font-weight-bold mr-1 my-1" href="{{ route('kategoriRuangan.show',$k->id) }}"><i class="fa fa-eye"></i> Detail</a>
                                                            <a class="btn btn-sm btn-warning text-white font-weight-bold mr-1 my-1" href="{{ route('kategoriRuangan.edit',$k->id) }}"><i class="fa fa-pencil"></i> Ubah</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" class="btn btn-sm btn-danger text-white font-weight-bold mr-1 my-1"><i class="fa fa-trash"></i> Hapus</button>
                                                        </div>
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