 @extends('layouts.layout')
 @section('content')
 <!-- Page Header Start -->
        <div class="container-fluid page-header p-0">
            <div class="container-fluid page-header-inner-gedung">
                <div class="container text-center">
                    <div class="row">
                        
                    </div>
                    <div class="row bg-dark m-md-3 my-3 p-2" style="border-radius: 1rem; border: .2rem dashed white">
                        <div class="col-12 my-5">
                            <h5 class="text-primary">
                                Harap transfer ke rekening dibawah ini
                            </h5>
                        </div>
                        <div class="col-md-6 p-2 mb-5">
                            <h4 class="text-primary my-3">
                                Bank Central Asia
                            </h4>
                            <img src="{{ url('public/img/bca.svg')}}" class="img-fluid px-2 mb-5" alt="bca-bank-logo" style="max-width: 250px; width: 100%;">
                            <h4 class="text-primary">
                                Nomer Rekening <br> <span class="h1 my-1 d-block text-white">5410425787</span>
                            </h4>
                            <h4 class="text-primary">
                                A/n <br> <span class="h1 my-1 d-block text-white">PT. SIMPERU</span>
                            </h4>
                        </div>
                        <div class="col-md-6 p-2 my-5 d-flex flex-column justify-content-center align-items-center">
                            <h1 class="text-white mb-3" id="countDown">
                            </h1>
                            <h5 class="text-primary mb-3">
                                Berlaku dari :<br/>
                                <span>{{$countDown['first']}}</span>
                            </h5>
                            <h5 class="text-primary mb-3">
                                Samapai dengan :<br/>
                                <span>{{$countDown['second']}}</span>
                            </h5>
                            <a class="btn btn-md btn-primary rounded-3" href="{{route('peminjamanku.index')}}">
                                Konfirmasi Pembayaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                let timeFirst = new Date().getTime();
                let timeSecond = new Date("{{$countDown['second']}}").getTime();
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
                        $('#countDown').html('Expired');
                    }
                    $('#countDown').html(result);
                }, 1000);
            });
            </script>
            
 @endsection