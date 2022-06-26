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
                        <li class="breadcrumb-item">Daftar Gedung</li>
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
                                    <div class="d-flex justify-content-between flex-row-reverse align-content-center mr-4 ml-4">
                                        <a href="{{route('gedung.create')}}" class="btn btn-success font-weight-bold text-white"><i class="fa fa-plus"></i> Tambah Data</a>
                                        <a href="{{url('gedungpdf')}}" class="btn btn-danger font-weight-bold text-white"><i class="fa fa-plus"></i> PDF</a>
                                        <span class="h3 font-weight-bold">Daftar Gedung </span>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach($gedung as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->kode }}</td>
                                                <td>{{ $row->nama_gedung }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td><img class="img-fluid border p-2 shadow" style="max-width: 300px; max-height: 300px" src="{{ asset('storage/post-image/'.$row->foto) }}" alt="{{ $row->nama_gedung }}"></td>
                                                <td>
                                                <form class="d-flex justify-content-center align-items-center" action="{{ route('gedung.destroy',$row->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info text-white font-weight-bold mx-1 my-1" href="{{ route('gedung.show',$row->id) }}"><i class="fa fa-eye"></i> Detail</a>
                                                    <a class="btn btn-sm btn-warning text-white font-weight-bold mx-1 my-1" href="{{ route('gedung.edit',$row->id) }}"><i class="fa fa-pencil"></i> Ubah</a>
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