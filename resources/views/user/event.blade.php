@extends('layout-En.master')
@section('content')
    <div class="p-5 row">
        {{-- بداية الكارد --}}
        @foreach ($events as $event)
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog-item">
                    <div class="position-relative">
                        @if ($event->service_id)
                            <img class="img-fluid w-100"
                                src="{{ asset(str_replace(app_path(), '', $event->service->image)) }}" alt="">
                        @elseif($event->place->images()->count() > 0)
                            <img class="img-fluid w-100"
                                src="{{ asset(str_replace(app_path(), '', $event->place->images()->first()->image)) }}"
                                alt="">
                        @else
                            <img class="img-fluid w-100" src="img/event.png" alt="">
                        @endif
                        <div class="blog-date" style="width: 87px;">
                            <h6 class="font-weight-bold mb-n1">{{ date('y', strtotime($event->start_date)) }} /
                                {{ date('m', strtotime($event->start_date)) }}
                                / <i
                                    class="text-white text-uppercase">{{ date('d', strtotime($event->start_date)) }}</i></b>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <a class="text-primary text-uppercase text-decoration-none"
                                href="">{{ $event->place->translations()->where('locale', 'en')->first()->name }}</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none"
                                href="">{{ $event->translations()->where('locale', 'en')->first()->name }}</a>
                        </div>
                        <h6 class="d-flex justify-content-end"><a class="btn btn-primary"
                                href="{{ route('event_details-en', ['id' => $event->id]) }}" style="border-radius:3px;">More
                                details
                                for
                                Booking</a></h6>

                    </div>
                </div>
            </div>
        @endforeach
        {{-- نهاية الكارد --}}



    </div>
@endsection
