 @extends('layouts.layout')
 @section('content')
<div class="container-fluid page-header p-0">
    <div class="container-fluid page-header-inner-gedung py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-end">
                    <div class="w-75">
                        <div class="col-12 text-start mb-5">
                            <div class="w-fit-contet">
                                <span class="h3 d-block">Review Your Booking</span>
                            </div>
                        </div>
                        <div class="col-12 mt-3 text-start mb-5">
                            <h5 class="text-primary mb-3">Lorem, ipsum dolor.</h5>
                            <h2>Rp. 2.500.000 <span class="text-secondary h5" style="font-weight: 500">/ Bulan</span></h2>
                        </div>
                        <div class="col-12 mt-3 text-start">
                            <h5 class="text-dark mb-3">Informasi Tamu</h5>
                        </div>
                        <div class="col-12">
                            <form action="" class="text-start">
                                <div class="row mb-3">
                                    <label>Nama Tamu</label>
                                    <input type="text" class="form-control rounded-3" value="Bangef"/>
                                </div>
                                <div class="row mb-3">
                                    <label>Email Tamu</label>
                                    <input type="email" class="form-control rounded-3" value="Bangef@gmail.com"/>
                                </div>
                                <div class="row mb-3">
                                    <label>Nomer Telefon Tamu</label>
                                    <input type="tel" class="form-control rounded-3" value="+628899778855"/>
                                </div>
                                <div class="row">
                                    <span class="text-danger mb-3">*Pada proses check-in, wajib menunjukan KTP yang sesuai dengan data diatas</span>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button class="btn btn-primary rounded-3 hvr-icon-forward">Selanjutnya <i class="fas fa-arrow-right hvr-icon"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-start align-items-center">
                    <div class="card w-75 shadow bg-body" style="border-radius: 1rem">
                        <div class="card-header p-0" style="border-radius: 1rem">
                            <img class="img-fluid" src="{{ asset('img/room-1.jpg') }}" alt="" style="border-radius: 1rem">
                        </div>
                        <div class="card-body">
                            <div class="text-start py-2">
                                <span class="d-block font-weight-bold text-primary">Lorem, ipsum dolor.</span>
                                <h3 class="text-dark">Lorem, ipsum dolor.</h3>
                            </div>
                            <span class="d-block" style="border-bottom: 2px dashed rgba(0, 0, 0, .2)"/></span>
                            <div class="text-start py-2 my-2">
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <i class="text-primary fas fa-users"></i>
                                    </div>
                                    <div class="col-11">
                                        <span class="d-block font-weight-bold text-secondary">2 Orang</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-1">
                                        <i class="text-primary fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="col-4">
                                        <span class="text-secondary">16 Juni 2022</span><br/>
                                        <span>13:00</span>
                                    </div>
                                    <div class="col-2">
                                        <i class="text-primary fas fa-arrow-right"></i>
                                    </div>
                                    <div class="col-4">
                                        <span class="text-secondary">16 Juni 2022</span><br/>
                                        <span>13:00</span>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block" style="border-bottom: 2px dashed rgba(0, 0, 0, .2)"/></span>
                            <div class="text-start py-2 my-2">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <span>Rp. 2.500.000 <i class="text-secondary fas fa-times"></i> 1 Bulan</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="d-block font-weight-bold text-secondary"> Rp. 2.500.000 </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-start py-2 my-2">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <span class="h6">Total</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="h6">Rp. 2.500.000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
        

 @endsection