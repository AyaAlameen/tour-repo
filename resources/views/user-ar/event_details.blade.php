@extends('layout-Ar.master')
@section('content')
    <div class="container" style="flex-direction: row;">




        {{-- بداسة كارد العرض --}}
        <div class="mainCard container w-100 m-auto d-flex" style="border-radius: 10px; margin-top: 50px !important;">



            <div class="d-flex">

                <div class="p-4">
                    <div class="d-flex " style="justify-content: space-between;">
                        <h4 class=" p-2 pr-2">{{ $event->translations()->where('locale', 'ar')->first()->name }}</h4>
                    </div>
                    <p class="pr-2 pr-2 text-body text-end" style="text-align: justify;">
                        {{ $event->translations()->where('locale', 'ar')->first()->description }}</p>
                    <div class="d-flex" style=" align-items: baseline; ">
                        <i class="fa fa-location-dot"></i>
                        <h5 class=" p-2 pr-2">{{ $event->place->translations()->where('locale', 'ar')->first()->name }}</h5>
                    </div>
                    {{-- اذا كان العرض على خدمة --}}
                    @if ($event->service_id)
                        <div class="d-flex" style=" align-items: baseline; ">
                            <i class="fab fa-servicestack"></i>
                            <h5 class=" p-2 pr-2">
                                {{ $event->service->translations()->where('locale', 'ar')->first()->name }} </h5>
                        </div>
                    @endif

                    <div class="d-flex" style="align-items: baseline; ">
                        <i class="fa fa-calendar-alt"></i>
                        <h5 class=" p-2 pr-2">من تاريخ : {{ $event->start_date }}</h5>
                    </div>
                    <div class="d-flex" style="align-items: baseline; ">
                        <i class="fa fa-calendar-alt"></i>
                        <h5 class=" p-2 pr-2">إلى تاريخ : {{ $event->end_date }}</h5>
                    </div>






                    <div class="d-flex h-25 mt-5" style="justify-content: flex-end; align-items: baseline;">
                        <h6 class="d-inline ml-4">الكلفة : {{ $event->cost }} ل.س</h6>
                        @isset(Auth::user()->id)
                            <button class="btn btn-primary ml-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal20">حجز</button>
                        @else
                            <button onclick="loginBefore()" class="btn btn-primary ml-4">حجز</button>
                        @endisset
                    </div>
                </div>
            </div>


            {{-- نهاية كارد العرض --}}


            @if ($event->service_id)
                <img class="p-5" width="500px" height="500px"
                    src="{{ asset(str_replace(app_path(), '', $event->service->image)) }}" alt="">
            @elseif($event->place->images()->count() > 0)
                <img class="p-5" width="500px" height="500px"
                    src="{{ asset(str_replace(app_path(), '', $event->place->images()->first()->image)) }}" alt="">
            @else
                <img class="p-5" width="500px" height="500px" src="img/event.png" alt="">
            @endif

        </div>
        {{-- نهاية  الخدمات --}}
    </div>
@endsection
