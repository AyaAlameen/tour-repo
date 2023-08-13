@extends('layout-En.master')
@section('content')
<div class="p-5 row">
@foreach ($offers as $offer)

{{-- بداية الكارد --}}
<div class="text-center pb-4 mb-3 col-4">
    <img class="img-fluid m-auto" src="img/gift.png" style="width: 100px; height: 100px;">
    <div class="testimonial-text bg-white p-4 mt-n5" style="height: 400px;">
        <h5 class="text-truncate mt-5">{{$offer->translations()->where('locale', 'en')->first()->name}}</h5>
        <h5 class="text-truncate">{{$offer->place->translations()->where('locale', 'en')->first()->name}}</h5>
        
        @if($offer->service)
                    <h5 class="text-truncate">{{$offer->service->translations()->where('locale', 'en')->first()->name}}</h5>
                @endif
                <p class="mt-2 h-50">{{$offer->translations()->where('locale', 'en')->first()->description}}
                </p>
        <div class="d-flex h-25" style="flex-direction:row; justify-content:space-around;">
            <span>cost : {{$offer->cost}} S.P</span>
            <h6><a class="btn btn-primary"  href="{{route('offer_details-en', ['id' => $offer->id])}}" style="border-radius:3px;">book now </a></h6>
        </div>
    </div>
</div>
{{-- نهاية الكارد --}}
@endforeach



</div>

@endsection