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
                <!-- <div class="row">
                    <div class="col-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success m-2">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped zero-configuration">
                                        <div class="d-flex justify-content-between align-content-center">
                                            <span class="h3 font-weight-bold text-info">Daftar Fasilitas </span>
                                            <div class="btn-group">
                                                <a href="{{route('fasilitas.create')}}" class="btn btn-sm btn-info font-weight-bold text-white mr-1 my-1"><i class="fa fa-plus"></i> Tambah Data</a>
                                                <a href="{{url('fasilitaspdf')}}" class="btn btn-sm btn-danger font-weight-bold text-white mr-1 my-1"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                                <a href="{{url('fasilitasexcel')}}" class="btn btn-sm btn-success font-weight-bold text-white mr-1 my-1"><i class="fa fa-file-excel-o"></i> Excel</a>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Fasilitas</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no=1; @endphp
                                            @foreach($fasilitas as $fas)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $fas->nama_fasilitas }}</td>
                                                <td class="d-flex justify-content-center"><img class="border p-2 shadow" style="min-width: 70px;width: 30%; max-height: 50%" src="{{ asset('storage/post-image/'.$fas->foto) }}" alt="{{ $fas->nama_failitas }}"></td>
                                                    <td>
                                                    <form class="d-flex justify-content-center align-items-center" action="{{ route('fasilitas.destroy',$fas->id) }}" method="POST">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-info text-white font-weight-bold mr-1 my-1" href="{{ route('fasilitas.show',$fas->id) }}"><i class="fa fa-eye"></i> Detail</a>
                                                            <a class="btn btn-sm btn-warning text-white font-weight-bold mr-1 my-1" href="{{ route('fasilitas.edit',$fas->id) }}"><i class="fa fa-pencil"></i> Ubah</a>
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