@extends('layout-En.master')
@section('content')


    <!-- Header Start -->
    <div class="container-fluid about-page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">About</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">About</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->




     <!-- About Start -->
     <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class=" w-100 h-100" src="../img/ياسمين دمشقي بالطول.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5" style="position: relative; left: 70px;">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5"  style="box-shadow: #64686c33 3px -3px 6px 0.5px;" >
                        <h6 class="text-primary text-uppercase">About us</h6>
                        <h1 class="mb-3"> We Provide Best Tour Packages In Your Budget</h1>
                        <p>A website that specializes in helping you book your hotel, tourist tour, car rental, and tourist
                            information about all the places, regions, and tourist and archaeological attractions in Syria.</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/d90d3ccf930b10d60f4d7cc7e96c342c.jpg" alt="">
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class="container-fluid pb-5 pt-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">We offer the best places at the lowest cost</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">We provide the best services that you need on your tour</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">You will get acquainted with the entire civilization of Syria and its legacy
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
    @if ($messages->count() > 0)
        <!-- messages Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase">آراء الزبائن</h6>
                    <h1>طالع آراءالزبائن معنا</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($messages as $message)
                        <!-- بداية الكارد -->
                        <div class="text-center pb-4 mb-3" style="direction:rtl;">
                            <img class="img-fluid m-auto" src="img/chat-box.png" style="width: 120px; height: 120px;">
                            <div class="testimonial-text bg-white p-4 mt-n5" style="height: 300px;">
                                {{-- <h5 class="text-truncate mt-5">اسم المستخدم</h5> --}}
                                <p class="mt-5">{{ $message->message }} </p>
                            </div>
                        </div>
                        <!-- نهاية الكارد -->
                    @endforeach

                </div>
            </div>
        </div>
        <!-- messages End -->
    @endif


@endsection
