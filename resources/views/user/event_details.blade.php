@extends('layout-En.master')
@section('content')
    {{-- بداسة كارد العرض --}}
    <div class="mainCard container w-100 m-auto d-flex"
        style="border-radius: 10px; margin-top: 50px !important; flex-direction: row-reverse;">

        @if ($event->service_id)
            <img class="p-5" width="500px" height="500px"
                src="{{ asset(str_replace(app_path(), '', $event->service->image)) }}" alt="">
        @elseif($event->place->images()->count() > 0)
            <img class="p-5" width="500px" height="500px"
                src="{{ asset(str_replace(app_path(), '', $event->place->images()->first()->image)) }}" alt="">
        @else
            <img class="p-5" width="500px" height="500px" src="img/event.png" alt="">
        @endif
        <div class="d-flex">

            <div class="p-4">
                <div class="d-flex " style="justify-content: space-between;">
                    <h4 class=" p-2 pl-2">{{ $event->translations()->where('locale', 'en')->first()->name }}</h4>
                </div>
                <p class="pr-2 pl-2 text-body" style="text-align: justify;"> {{ $event->translations()->where('locale', 'en')->first()->description }}</p>
                <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-location-dot"></i>
                    <h5 class=" p-2 pl-2">{{ $event->place->translations()->where('locale', 'en')->first()->name }}</h5>
                </div>
                {{-- اذا كان العرض على خدمة --}}
                @if ($event->service_id)
                    <div style="display: flex; align-items: baseline; ">
                        <i class="fab fa-servicestack"></i>
                        <h5 class=" p-2 pl-2">{{ $event->service->translations()->where('locale', 'en')->first()->name }}</h5>
                    </div>
                @endif
                <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">From : {{ $event->start_date }}</h5>
                </div>
                <div style="display: flex; align-items: baseline; ">
                    <i class="fa fa-calendar-alt"></i>
                    <h5 class=" p-2 pl-2">To : {{ $event->end_date }}</h5>
                </div>
                <div class="d-flex h-25 mt-3" style="justify-content: flex-end; align-items: baseline;">
                    <h6 class="d-inline ml-4">cost : {{ $event->cost }} S.P</h6>
                    @isset(Auth::user()->id)
                        <button class="btn btn-primary ml-4" data-bs-toggle="modal"
                            data-bs-target="#exampleModal20">book</button>
                    @else
                        <button onclick="loginBefore()" class="btn btn-primary ml-4">book</button>
                    @endisset
                </div>
            </div>
        </div>


        {{-- نهاية كارد العرض --}}

    </div>
@endsection
