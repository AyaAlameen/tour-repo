@extends('layout-En.master')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid trip-page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">الرحلات</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase">الرحلات</p>
                    <i class="fa fa-angle-double-left pt-1 px-3"></i>
                    <p class="m-0 text-uppercase"><a class="text-white" href="">الرئيسة</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    {{--  trips cards--}}

    <div  class=" row m-0 p-5" >
        <!-- بداية الكارد -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="package-item bg-white mb-2">
                      <!-- صور أماكن الرحلة -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img class="img-fluid w-100" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
  </div>
  <div class="carousel-item">
  <img class="img-fluid w-100" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
  </div>
  <div class="carousel-item">
  <img class="img-fluid w-100" src="img/36d7d6476b1b16d50bf45f9bcf19bdcc.jpg" alt="">
  </div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
<!-- نهاية صور أماكن الرحلة -->
                <div class="p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>دمشق</small>
                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 أيام</small>
                    </div>
                    <br>
                   
                    <div class="border-top mt-4 pt-4">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h5 class="m-0" style="direction:rtl;">500.000 <small>ل.س</small></h5>
                            <h6><a class="btn btn-primary"  href="{{route('tripmore')}}"  style="border-radius:3px;">المزيد من التفاصيل للحجز</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- نهاية الكارد -->
 
    {{-- end trips cards --}}

    @endsection