@extends('layout-En.master')
@section('content')
    <h2 class="p-5" style="text-align: right;"> استكشف (اسم المحافظة) </h2>
    {{-- Gallery --}}
    <div class="d-flex container mt-2 justify-content-center">
        <div style="width: 45%; height: 540px;">
            <img src="img/440px-Aleppo_Citadel_02_-_Bastion.jpg" width="100%" height="100%">
            <button
                style="position: relative; left:75%; bottom:35px; border-radius:20px; font-size:14px; border-color:var(--app-bg);"
                data-bs-toggle="modal" data-bs-target="#exampleModal">عرض
                جميع الصور</button>

            {{-- picturs modal --}}

            <!-- Modal -->
            <div class="modal fade " data-bs-backdrop="static" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " style="max-width: 800px;">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">جميع الصور</h5>
                            <button type="button" class="btn-close m-0 close"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                                       <!-- صور المحافظة -->
                     <div id="carouselExample2Indicators" class="carousel slide  m-auto w-100" data-bs-ride="carousel">
                     
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                          <img class="img-fluid w-100" style="padding-inline: 80px;" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="" >
                          </div>
                          <div class="carousel-item">
                          <img class="img-fluid w-100" style="padding-inline: 80px;" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                          </div>
                          <div class="carousel-item">
                          <img class="img-fluid w-100" style="padding-inline: 80px;" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2Indicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" style="background-image:url(../img/previous.png); " aria-hidden="false"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2Indicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" style="background-image:url(../img/next.png);" aria-hidden="false"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                              <!-- نهاية صور المحافظة -->
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
    {{-- وصف المحافظة --}}
    <div class="container w-50 m-auto">
        <h4 class="pt-5 pb-3" style="text-align: right;">نبذة عن (اسم المحافظة ) </h4>
        <p style="text-align: right;">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Ea sed voluptas fuga modi. Voluptatem distinctio debitis tenetur quos unde nostrum,
            omnis, expedita, maxime maiores ipsam exercitationem itaque! Atque, voluptates iste!</p>
    </div>
    {{-- نهاية الوصف --}}
    {{-- أشهر الأماكن بالتصنيفات --}}
    <div class="container">
        <h4 class="p-5" style="text-align: right; padding-bottom:5px !important;">اشهر الأماكن في (اسم المحافظة )
        </h4>
        {{-- الأصناف --}}
        <div class="container">
            <h4 class="p-5" style="text-align: right;"> أماكن (اسم الصنف ^_^ ) </h4>
            <div class="container d-flex justify-content-center m-3">
                <button class="m-2 btn btn-primary">صنف فرعي 1</button>
                <button class="m-2 btn btn-primary">صنف فرعي 6</button>
                <button class="m-2 btn btn-primary">صنف فرعي 5</button>
                <button class="m-2 btn btn-primary">صنف فرعي 4</button>
                <button class="m-2 btn btn-primary">صنف فرعي 3</button>
                <button class="m-2 btn btn-primary">صنف فرعي 2</button>
            </div>
            {{-- بداسة كارد المكان --}}
            <div class="mainCard  w-75 m-auto " style="border-radius: 10px;">
                <div class="d-flex">
                    <div class="text-center ">
                        <img src="img/aleppo-palace-hotel.jpg"
                            style="padding: 10px; box-sizing: content-box; border-radius: 20px;" width="200px"
                            height="200px">
                        <i class="fas fa-star p-2"></i>
                        <i class="fas fa-star p-2 "></i>
                        <i class="fas fa-star p-2 "></i>
                        <i class="fas fa-star p-2"></i>
                    </div>
                    <div>
                        <div class="d-flex " style="justify-content: space-between;">
                            <h4 class="text-right p-2">فندق قصر حلب</h4>
                            <div>
                                <h5 class="p-2 pl-4">8.2</h5>
                            </div>
                        </div>
                        <h5 class="text-right pr-2">ناحية الشهباء</h5>
                        <p class="text-right pr-2 text-primary">aleppo-palace-hotel@gmail.com</p>
                        <p class="text-right pr-2">Lorem ipsum dolor sit amet consectetur adipisicing elit
                            . Exercitationem, corporis rem culpa perspiciatis
                            odit architecto expedita iure illum error inventore m
                            inus molestias eaque dolorem blanditiis aperiam recusandae quaerat? Minus, ducimus!</p>
                    </div>
                </div>
                @isset(Auth::user()->id)
                    <div class="w-100 text-right pr-3 m-auto">
                        <input type="submit" value="إرسال" class="m-2 btn btn-primary"
                            style="font-size: 14px; height: 30px;  width: 12%; padding:3px;">
                        <input type="text" style="direction: rtl; width: 77%;" placeholder="اترك تعليق">
                        <img src="{{ asset(Auth::user()->image) }}" style="border-radius: 50%;  margin-left:4px;" width="40px"
                        height="40px">
                        
                    </div>
                @else
                    <div class="w-100 text-right pr-3 m-auto">
                        <input type="submit" value="إرسال" onClick="loginBefore()" class="m-2 btn btn-primary"
                            style="font-size: 14px; height: 30px;  width: 12%; padding:3px;">
                        <input type="text" style="direction: rtl; width: 77%;" placeholder="اترك تعليق">
                        <img src="{{ asset('img/1656869576_personalimg.jpg') }}" style="border-radius: 50%;  margin-left:4px;"
                            width="40px" height="40px">
                    </div>
                @endisset

            </div>
            <button class="m-2 btn btn-primary"
                style="width: 70%; margin-left: 15% !important ; margin-bottom: 35px !important;"><a
                    style="color: #fff; width: 100%; display: inline-block;" href="{{ route('place_details_en') }}">
                    المزيد من التفاصيل حول اسم المكان للحجز</a>
            </button>

            {{-- نهاية كارد المكان --}}

        </div>
        {{-- نهاية الأصناف --}}
    </div>
    {{-- نهاية أشهر الأماكن --}}
@endsection
