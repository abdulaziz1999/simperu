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
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <div class="d-flex justify-content-between">
                                            <span class="h3 font-weight-bold">Daftar Gedung </span>
                                            <a href="{{ url('/admin-gedung-form') }}" class="btn btn-success font-weight-bold text-white"><i class="fa fa-plus"></i> Tambah Data</a>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- @if (is_array($gedung ?? '') || is_object($gedung ?? '')): -->
                                            @foreach($gedung as $row):
                                            <tr>
                                                <td>{{ $row->kode }}</td>
                                                <td>{{ $row->nama_gedung }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td><img src="{{ asset('storage/'.$row->foto) }}" alt="{{ $row->nama_gedung }}" width="100"></td>
                                                <td>
                                                <form action="{{ route('admingedung.destroy',$row->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info" href="{{ route('admingedung.show',$row->id) }}"><i class="fa fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('admingedung.edit',$row->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <!-- @endif -->
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