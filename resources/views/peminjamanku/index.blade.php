@extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
 <div class="container-fluid page-header p-0">
     <div class="container-fluid page-header-inner-gedung">
         <div class="container text-center">
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-md-8">
                    <div class="row bg-dark p-5" style="border-radius: 1rem; border: .2rem dashed white">
                        <div class="col-12 mb-3">
                            <h3 class="text-primary">
                                PeminjamanKu
                            </h3>
                        </div>
                        @if (count($peminjamanByUser)>0)
                        @foreach ($peminjamanByUser as $pbu)
                        {{-- FEEDBACK --}}
                        @if (date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($pbu->tgl_selesai . '+ ' . substr($pbu->jam_selesai, 0, 2) . ' hours')))
                        <div class="col-sm-12 m-0">
                            <div class="p-3 mx-5 my-2 bg-primary" style="border-radius: 1rem; border: 1px dashed white;">
                                <div class="row">
                                    <div class="col-12 col-md-8 text-start">
                                        <h6 class="text-dark">
                                            Berikan Nilai Ruangan Kami
                                        </h6>
                                        <p class="text-dark" style="font-size: .8rem">
                                            {{$pbu->nama_ruangan}} <br/>
                                            Tanggal : {{$pbu->tgl_pinjam}} s/d {{$pbu->tgl_selesai}}<br/>
                                            Jam : {{$pbu->jam_mulai}} s/d {{$pbu->jam_selesai}} WIB
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                                        <button id="fb{{$fbIncre[0]++}}" class="btn btn-dark {{($pbu->keterangan_feedback != '') ? 'd-none':''}}" style="border-radius: .5rem" data-bs-toggle="modal" data-bs-target="#fbBsTarget{{$fbIncre[1]++}}">
                                            Berikan Penilaian
                                        </button>
                                        @if ($pbu->keterangan_feedback != '')
                                            <h6 class="alert-success rounded-pill px-3 py-2 m-0">
                                                Feedback Terkirim
                                            </h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- BUKTI PEMBAYARAN --}}
                        <div class="col-sm-12 m-0">
                            <div class="p-3 mx-5 my-2" style="border-radius: 1rem; border: 1px dashed white">
                                <div class="row">
                                    <div class="col-12 col-lg-8 text-start">
                                        <h6 class="text-primary">
                                            Batas Akhir Pembayaran
                                        </h6>
                                        <p class="text-white" style="font-size: .8rem">
                                            {{$pbu->nama_ruangan}} <br/>
                                            Tanggal : {{$pbu->tgl_pinjam}} s/d {{$pbu->tgl_selesai}}<br/>
                                            Jam : {{$pbu->jam_mulai}} s/d {{$pbu->jam_selesai}} WIB
                                        </p>
                                        <button id="btnShowOrNot{{$btnShowOrNot++}}" class="btn btn-primary {{($pbu->status_pembayaran == 'Lunas') ? 'd-none':''}}" style="border-radius: .5rem" data-bs-toggle="modal" data-bs-target="#modalBsTarget{{$modalBsTarget++}}">
                                            Upload Bukti Pembayaran
                                        </button>
                                    </div>
                                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                                        @if ($pbu->status_pembayaran != null && $pbu->status_pembayaran == 'Lunas')
                                        <h6 class="alert-success rounded-pill px-3 py-2 m-0">
                                            {{$pbu->status_pembayaran}}
                                        </h6>
                                        <a href="{{route('peminjamanku.invoice', $pbu->pembayaran_id)}}" class="btn btn-success rounded-pill ms-2">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        @else
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <h6 class="alert-danger rounded-pill px-3 py-2 m-0">
                                                {{$pbu->status_pembayaran}}
                                            </h6>
                                            <h3 class="text-white mt-1" id="countDown{{$i++}}">
                                            </h3>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <span class="d-block text-secondary h1 font-weight-bold p-5">Belum Ada Peminjaman</span>
                        </div>
                        @endif
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            {{ $peminjamanByUser->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <!-- Modal -->
 @if (count($peminjamanByUser)>0)
 @foreach ($peminjamanByUser as $pbu)
 <div class="modal fade" id="modalBsTarget{{$modalId++}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAriaLabelledBy{{$modalAriaLabelledBy++}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAriaLabelledBy{{$modalTitleId++}}">Upload Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('peminjamanku.update', $pbu->peminjaman_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-12 d-flex justify-content-start align-content-center">
                            <img src="{{asset('storage/post-payment/default.jpg')}}" class="img-preview img-fluid mb-3" style="display: none; height: 100%; max-height: 600px; max-width: auto; width: 100%; ">
                        </div>
                        <div class="col-12 d-flex justify-content-start align-content-center flex-column">
                            <input class="form-control input-default" type="file" id="bukti_pembayaran" name="bukti_pembayaran" onchange="previewImage()">
                            <label class="text-danger mt-1" style="font-size: .8rem">*Format bukti pembayaran : jpg, jpeg, png</label>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 @endforeach
 @endif
 <!-- Modal -->
 @if (count($peminjamanByUser)>0)
 @foreach ($peminjamanByUser as $pbu)
 <div class="modal fade" id="fbBsTarget{{$fbIncre[2]++}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fbAriaLabelledBy{{$fbIncre[3]++}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fbAriaLabelledBy{{$fbIncre[4]++}}">Nilai Ruangan Kami</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('peminjamanku.update', $pbu->peminjaman_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-12 d-flex justify-content-start align-content-center flex-column">
                            <label>Berikan Nilai</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="poin" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Buruk</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="poin" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">Tidak Terlalu Buruk</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="poin" id="inlineRadio3" value="3">
                                    <label class="form-check-label" for="inlineRadio3">Bisa Saja</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="poin" id="inlineRadio4" value="4">
                                    <label class="form-check-label" for="inlineRadio4">Bagus</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="poin" id="inlineRadio5" value="5">
                                    <label class="form-check-label" for="inlineRadio5">Bagus Banget</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-start align-content-center flex-column mt-2">
                            <label>Kritik dan Masukan</label>
                            <textarea class="p-3" name="keterangan_feedback" cols="10" rows="5" style="border-radius: 1rem"></textarea>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 @endforeach
 @endif
    <script>
        // All Variabel
        let varSecond = null;
        function previewImage() {
            const image = document.querySelector('#bukti_pembayaran');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script>
        $(function(){
            let findNumberPage = '{{$peminjamanByUser->currentPage()}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}",
                },
                url:"{{url('')}}/peminjamanku/available-countdown?page="+findNumberPage,
                method : "POST",
                data : {id:findNumberPage},
                dataType : 'json',
                success : function(data){
                    let timeFirst = new Date().getTime();
                    $.each(data, function (i, value) {
                        let selector = `#${value.id}`;
                        let modalSelector = `#btnShowOrNot${i}`;
                        $(selector).ready(function(){
                            let timeSecond = new Date(value.time).getTime();
                            let distance = timeSecond - timeFirst;
                            let x = setInterval(function () {
                                let objTime = {
                                    'days': Math.floor(distance / (1000 * 60 * 60 * 24)),
                                    'hours': Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
                                    'minutes': Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
                                    'seconds': Math.floor((distance % (1000 * 60)) / 1000)
                                };
                                distance -= 1000;
                                let result = `${objTime.hours} : ${objTime.minutes} : ${objTime.seconds}`;
                                if (distance <= 0) {
                                    clearInterval(x);
                                    $(selector).html('<h6 class="alert-danger rounded-pill p-2 m-0">Waktu Habis</h6>');
                                    $(modalSelector).addClass('d-none');
                                }else{
                                    if ('{{isset($peminjamanByUser[0]->status_pembayaran)? $peminjamanByUser[0]->status_pembayaran:''}}' == 'Lunas') {
                                        clearInterval(x);
                                    } else {
                                        $(selector).html(result);
                                    }
                                }
                            }, 1000);
                        });
                    });
                }
            });
        });
    </script>
 @endsection