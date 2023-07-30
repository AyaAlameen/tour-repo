@extends('layout-En.master')
@section('content')
<div class="p-5 row">
{{-- بداية الكارد --}}
<div class="text-center pb-4 mb-3 col-4">
    <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
    <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
        <h5 class="text-truncate mt-5">اسم المكان أو الخدمة</h5>
        <h5 class="text-truncate">اسم العرض</h5>
        <p class="mt-2 h-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. In animi, tempore
            maiores modi iure consequuntur
            eum vel voluptate excepturi veritatis commodi.
            A unde fuga quas voluptates ab sunt blanditiis eaque!
        </p>

        <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
            <span>cost : 40000</span>
            <h6><a class="btn btn-primary"  href="{{route('offer_details-en')}}" style="border-radius:3px;">book now </a></h6>
        </div>
    </div>
</div>
{{-- نهاية الكارد --}}



</div>

@endsection