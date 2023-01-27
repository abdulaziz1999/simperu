@extends('admin.layout')
@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin')}}" class="text-primary">Dashboard</a></li>
                        <li class="breadcrumb-item">Peminjaman</li>
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
                                    <div class="d-flex justify-content-between align-content-center mr-4 ml-4">
                                        <span class="h3 font-weight-bold text-primary">Data Peminjaman</span>
                                        <!-- <div class="btn-group">
                                            <a href="{{route('gedung.create')}}" class="btn btn-sm btn-primary font-weight-bold text-white mr-1 my-1"><i class="fa fa-plus"></i> Tambah Data</a>
                                            <a href="{{url('gedungpdf')}}" class="btn btn-sm btn-danger font-weight-bold text-white mr-1 my-1"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                            <a href="{{url('gedungexcel')}}" class="btn btn-sm btn-success font-weight-bold text-white mr-1 my-1"><i class="fa fa-file-excel-o"></i> Excel</a>
                                        </div> -->
                                    </div>
                                    <table class="table table-striped zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peminjam</th>
                                                {{-- <th>Foto </th> --}}
                                                <th>Nama Ruangan</th>
                                                <th>Waktu Peminjaman</th>
                                                <th>Harga</th>
                                                <th>Dokument</th>
                                                <th>Bukti Bayar </th>
                                                <th>Status </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach($dataPeminjaman as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{$row->name}}</td>
                                                {{-- <td><img class="img-fluid border p-2 shadow" style="max-width: 300px; max-height: 300px;" src="{{ asset('storage/post-image/'.$row->foto1) }}" alt="{{ $row->nama_ruangan  }}"></td> --}}
                                                <td>{{ $row->nama_ruangan }}</td>
                                                <td>{{ $row->tgl_pinjam }} - {{ $row->tgl_selesai }}</td>
                                                <td>{{ $row->harga }}</td>
                                                <td>{{ $row->dokumen }}</td>
                                                <td><img class="img-fluid border p-2 shadow" style="max-width: 300px; max-height: 300px;" src="{{ asset('storage/post-payment/'.$row->bukti_pembayaran) }}" alt="{{ $row->bukti_pembayaran}}"></td>
                                                {{-- <td>{{ $row->bukti_pembayaran }}</td> --}}
                                                <td> 
                                                    @if($row->status_peminjaman == 'Diajukan')
                                                        <span class="badge badge-pill badge-info">Diajukan</span>
                                                    @elseif($row->status_peminjaman == 'Disetujui')
                                                        <span class="badge badge-pill badge-success">Diterima</span>
                                                    @elseif($row->status_peminjaman == 'Ditolak')
                                                        <span class="badge badge-pill badge-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <form  action="{{ route('peminjaman.update',$row->peminjaman_id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="diterima">
                                                            <button class="btn btn-sm btn-success text-white font-weight-bold mr-1 my-1" type="submit"><i class="fa fa-eye"></i> Diterima</button>
                                                        </form>
                                                        <form  action="{{ route('peminjaman.update',$row->peminjaman_id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="ditolak">
                                                            <button class="btn btn-sm btn-danger text-white font-weight-bold mr-1 my-1" type="submit"><i class="fa fa-pencil"></i> Ditolak</button>
                                                        </form>
                                                    </div>
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