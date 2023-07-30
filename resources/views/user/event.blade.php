@extends('layout-En.master')
@section('content')
<div class="p-5 row">
{{-- بداية الكارد --}}
<div class="col-lg-4 col-md-6 mb-4 pb-2">
    <div class="blog-item">
        <div class="position-relative">
            <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
            <div class="blog-date">
                <h6 class="font-weight-bold mb-n1">01 / <i class="text-white text-uppercase">7</i></b>
            </div>
        </div>
        <div class="bg-white p-4">
            <div class="d-flex mb-2">
                <a class="text-primary text-uppercase text-decoration-none" href="">liki cafee</a>
                <span class="text-primary px-2">|</span>
                <a class="text-primary text-uppercase text-decoration-none" href="">champion chip</a>
            </div>
            <h6 class="d-flex justify-content-end"><a class="btn btn-primary"  href="{{route('event_details-en')}}" style="border-radius:3px;">More details for Booking</a></h6>

        </div>
    </div>
</div>

{{-- نهاية الكارد --}}



</div>

@endsection