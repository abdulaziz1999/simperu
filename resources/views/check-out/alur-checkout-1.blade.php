 @extends('layouts.layout')
 @section('content')
 <!-- progress bar Start -->
 <div class="container-fluid px-0">
     <div class="container-fluid px-0">
         <div class="container text-center">
             <div class="row px-0">
                 <div class="col-12 w-100 h-100 px-0">
                    <div class="bar-progres">
                        <div class="bar"></div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
<!-- ./progress bar Start -->
<div class="container-fluid page-header p-0"> {{-- background diambil dari foto gedung --}}
    <div class="container-fluid page-header-inner-gedung py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6">

                </div>         
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="card w-75 shadow" style="border-radius: 1rem">
                        <div class="card-header p-0" style="border-radius: 1rem">
                            <img class="img-fluid" src="{{ asset('img/room-1.jpg') }}" alt="" style="border-radius: 1rem">
                        </div>
                        <div class="card-body">
                            <div class="text-start py-2">
                                <span class="d-block font-weight-bold text-primary">Lorem, ipsum dolor.</span>
                                <h3 class="text-dark">Lorem, ipsum dolor.</h3>
                            </div>
                            <span class="d-block" style="border-bottom: 2px dashed rgba(0, 0, 0, .2)"/></span>
                            <div class="text-start py-2 my-2 border">
                                <span class="d-block font-weight-bold text-secondary"><i class="fas fa-user"></i> 2 Orang</span>
                                <span class="d-block font-weight-bold text-secondary"><i class="fas fa-calendar-alt"></i> 2 Orang</span>
                                <h3 class="text-dark">Lorem, ipsum dolor.</h3>
                            </div>
                            <hr/>

                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
        

 @endsection