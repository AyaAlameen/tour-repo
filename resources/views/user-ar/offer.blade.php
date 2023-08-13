@extends('layout-Ar.master')
@section('content')
<div class="p-5 row">
{{-- بداية الكارد --}}
@foreach ($offers as $offer)
    <div class="text-center pb-4 mb-3 col-4" style="direction:rtl;">
        <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
        <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
            <h5 class="text-truncate mt-5">{{$offer->translations()->where('locale', 'ar')->first()->name}}</h5>
                <h5 class="text-truncate">{{$offer->place->translations()->where('locale', 'ar')->first()->name}}</h5>
                @if($offer->service)
                    <h5 class="text-truncate">{{$offer->service->translations()->where('locale', 'ar')->first()->name}}</h5>
                @endif
            
            <p class="mt-2 h-50">{{$offer->translations()->where('locale', 'ar')->first()->description}}
            </p>

            <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
                <span>الكلفة : {{$offer->cost}}</span>
                <h6><a class="btn btn-primary"  href="{{route('offer_details-ar', ['id' => $offer->id])}}" style="border-radius:3px;">احجز الآن</a></h6>
            </div>
        </div>
    </div>
@endforeach

{{-- نهاية الكارد --}}



</div>

@endsection