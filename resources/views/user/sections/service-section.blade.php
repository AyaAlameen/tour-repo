<h4 class="p-5 " style="text-align: left; padding-bottom:5px !important;">Main service in
    {{ $place->translations()->where('locale', 'en')->first()->name }}</h4>
@foreach ($place->services as $service)
    @if (!$service->is_additional)
        {{-- بداسة كارد الخدمات الغير إضافية --}}
        <div class="mainCard  w-75 m-auto " style="border-radius: 10px; ">
            <div class="d-flex" style="flex-direction: row-reverse;">
                <div class="text-center ">
                    <img src="{{ asset(str_replace(app_path(), '', $service->image)) }}"
                        style="padding: 10px; box-sizing: content-box; border-radius: 20px;"
                        width="200px" height="200px">

                </div>
                <div class="pt-4 w-100" style="direction: ltr;">
                    <div class="d-flex " style="justify-content: space-between;">
                        <h4 class="text-left p-2">
                            {{ $service->translations()->where('locale', 'en')->first()->name }}</h4>
                    </div>
                    <p class="text-left pr-2 pl-2">
                        {{ $place->translations()->where('locale', 'en')->first()->description }}</p>
                    <div class="d-flex m-3 w-100 mt-5"
                        style="justify-content: flex-end; align-items: baseline;">
                        <h6 class="d-inline mr-4">cost : {{ $service->cost }} spy</h6>
                        @if ($service->people_count)
                            <br>
                            <h6 class="d-inline ml-4">Numper of people:{{ $service->people_count }}</h6>
                        @endif
                        @if ($service->reservation_period)
                            <br>
                            <h6 class="d-inline ml-4">Reservation period: @if ($service->reservation_period == '00:15')
                                    <span>quarter houre </span>
                                @elseif($service->reservation_period == '00:30')
                                    <span>half houre</span>
                                @elseif($service->reservation_period == '01:00')
                                    <span>Houre</span>
                                @elseif($service->reservation_period == '02:00')
                                    <span> two houres </span>
                                @elseif($service->reservation_period == '03:00')
                                    <span> three houres </span>
                                @elseif($service->reservation_period == '04:00')
                                    <span>foure houres</span>
                                @elseif(!$service->reservation_period)
                                    <span> </span>
                                @endif
                            </h6>
                        @endif
                        @isset(Auth::user()->id)
                            <button class="btn btn-primary mr-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal20">book</button>
                        @else
                            <button onclick="loginBefore()" class="btn btn-primary ml-4">book</button>
                        @endisset
                    </div>
                </div>

            </div>



        </div>
    @endif
@endforeach
{{-- نهاية كارد الخدمات الغير إضافية --}}


<h4 class="p-5" style="text-align: left; padding-bottom:5px !important;"> Additional service in

    {{ $place->translations()->where('locale', 'en')->first()->name }} </h4>
@foreach ($place->services as $service)
    @if ($service->is_additional)
        {{-- بداسة كارد الخدمات الغير إضافية --}}
        <div class="mainCard  w-75 m-auto " style="border-radius: 10px; ">
            <div class="d-flex" style="flex-direction: row-reverse;">
                <div class="text-center ">
                    <img src="{{ asset(str_replace(app_path(), '', $service->image)) }}"
                        style="padding: 10px; box-sizing: content-box; border-radius: 20px;"
                        width="200px" height="200px">

                </div>
                <div class="pt-4 w-100" style="direction: ltr;">
                    <div class="d-flex " style="justify-content: space-between;">
                        <h4 class="text-left p-2">
                            {{ $service->translations()->where('locale', 'en')->first()->name }}</h4>
                    </div>
                    <p class="text-left pr-2 pl-2">
                        {{ $place->translations()->where('locale', 'en')->first()->description }}</p>
                    <div class="d-flex m-3 w-100 mt-5"
                        style="justify-content: flex-end; align-items: baseline;">
                        <h6 class="d-inline mr-4">cost : {{ $service->cost }} spy</h6>
                        @if ($service->people_count)
                            <br>
                            <h6 class="d-inline ml-4">Numper of people:{{ $service->people_count }}</h6>
                        @endif
                        @if ($service->reservation_period)
                            <br>
                            <h6 class="d-inline ml-4">Reservation period: @if ($service->reservation_period == '00:15')
                                    <span>quarter houre </span>
                                @elseif($service->reservation_period == '00:30')
                                    <span>half houre</span>
                                @elseif($service->reservation_period == '01:00')
                                    <span>Houre</span>
                                @elseif($service->reservation_period == '02:00')
                                    <span> two houres </span>
                                @elseif($service->reservation_period == '03:00')
                                    <span> three houres </span>
                                @elseif($service->reservation_period == '04:00')
                                    <span>foure houres</span>
                                @elseif(!$service->reservation_period)
                                    <span> </span>
                                @endif
                            </h6>
                        @endif
                        @isset(Auth::user()->id)
                            <button class="btn btn-primary mr-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal20">book</button>
                        @else
                            <button onclick="loginBefore()" class="btn btn-primary ml-4">book</button>
                        @endisset
                    </div>
                </div>

            </div>



        </div>
    @endif
@endforeach
{{-- نهاية كارد الخدمات  الإضافية --}}