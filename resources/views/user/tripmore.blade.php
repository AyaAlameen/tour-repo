@extends('layout-En.master')
@section('content')

{{-- Gallery --}}
    <div class="d-flex container mt-5 justify-content-center">
        <div style="width: 45%; height: 540px;">
            <img src="img/440px-Aleppo_Citadel_02_-_Bastion.jpg" width="100%" height="100%">
            <button
                style="position: relative; left:150%; bottom:35px; border-radius:20px; font-size:14px; border-color:var(--app-bg);"
                data-bs-toggle="modal" data-bs-target="#exampleModal">View all photos</button>

            {{-- picturs modal --}}

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " style="max-width: 800px;">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">All photos</h5>
                            <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- صور المكان -->
                            <div id="carouselExample2Indicators" class="carousel slide  m-auto w-100"
                                data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="img-fluid w-100" style="padding-inline: 80px;"
                                            src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid w-100" style="padding-inline: 80px;"
                                            src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid w-100" style="padding-inline: 80px;"
                                            src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample2Indicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"
                                        style="background-image:url(../img/previous.png); " aria-hidden="false"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample2Indicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" style="background-image:url(../img/next.png);"
                                        aria-hidden="false"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- نهاية صور المكان -->
                        </div>


                    </div>
                </div>
            </div>
            {{-- end pic modal --}}
        </div>
        <div style="width: 35%; height: 540px;">
            <img src="img/caption.jpg" width="100%" height="60%">
            <img src="img/ALEPPO458976.gif" width="100%" height="40%">
        </div>
    </div>
    {{-- end Gallery --}}


    {{-- بداسة كارد الرحلة --}}
    <div class="mainCard  w-50 m-auto" style="border-radius: 10px; margin-top: 40px !important;"">
        <div class="d-flex">
           
            <div class="p-4">
                <div class="d-flex " style="justify-content: space-between;">
                    <h4 class=" p-2 pl-2">Trip Information</h4>
                </div>
                <p class="pr-2 pl-2 text-body" >Descriptiin: Lorem ipsum dolor sit a
                    met consectetur adipisicing elit. Commodi nulla, dolor quidem, aspernatur adipisci voluptatem magnam inventore
                     assumenda accusantium ipsum est possimus minus saepe ad, ullam dolore facere vel optio?</p>
                    
                    <h5 class=" p-2 pl-2">With TravelGuide: Mohamed</h5>
                 
                  <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">From :12-4-2023</h5>
                  </div>
                     <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">To :13-4-2023</h5>
                  </div>
                  <div style="display: flex; align-items: baseline;">
                    <i class="fa fa-car-alt"></i>
                    <h5 class=" p-2 pl-2">In cooperation with the transportation company : alrawda</h5>
                  </div>
                  <div style="display: flex; align-items: baseline; ">
                    <i class="fas fa-location-dot"></i>
                    <h5 class=" p-2 pl-2">The places to go</h5>
                  </div>
                  <ul >
                    <li><p class="text-body">place1</p></li>
                    <li><p class="text-body">place2</p></li>
                    <li><p class="text-body">place3</p></li>

                    
                </ul>
                   
            
       

                <div class="d-flex" style="justify-content: flex-end; align-items: baseline;">
                    <h6 class="d-inline ml-4">cost : 60000</h6>
                    @isset(Auth::user()->id)
                    <button class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#exampleModal20">book</button>
                    @else
                    <button onclick="loginBefore()" class="btn btn-primary ml-4">book</button>
                    @endisset
                </div>
            </div>
    </div>


    {{-- نهاية كارد الرحلة --}}





</div>
{{-- نهاية  الخدمات --}}


@endsection